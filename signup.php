<?php
session_start();
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php");
    exit();
}

// Sanitize inputs
$name     = trim($_POST['name'] ?? '');
$email    = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
$password = $_POST['password'] ?? '';
$role     = $_POST['role'] ?? 'patient'; // default patient

$errors = [];

// Validation
if (empty($name) || empty($email) || empty($password)) {
    $errors[] = "All fields are required!";
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email format!";
}
if (strlen($password) < 6) {
    $errors[] = "Password must be at least 6 characters!";
}
if (!in_array($role, ['admin','doctor','patient'])) {
    $role = 'patient'; // fallback
}

// If errors → back to signup
if (!empty($errors)) {
    $_SESSION['signup_errors'] = $errors;
    header("Location: index.php");
    exit();
}

// Check if email already exists
$stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $_SESSION['signup_errors'] = ["Email already registered!"];
    header("Location: index.php");
    exit();
}
$stmt->close();

// Insert new user
$hashed_password = password_hash($password, PASSWORD_BCRYPT);
$stmt = $conn->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $email, $hashed_password, $role);

if ($stmt->execute()) {
    $user_id = $stmt->insert_id;

    // --- Auto-login after signup ---
    $_SESSION['user_id'] = $user_id;
    $_SESSION['name']    = $name;
    $_SESSION['email']   = $email;
    $_SESSION['role']    = $role;

    // Redirect to dashboard based on role
    switch ($role) {
        case 'admin':
            header("Location: Admin/admin_dashboard.php");
            break;
        case 'doctor':
            header("Location: doctor/doctor_dashboard.php");
            break;
        case 'patient':
        default:
            header("Location: patient/patient_dashboard.php");
            break;
    }
    exit();
} else {
    $_SESSION['signup_errors'] = ["Signup failed. Try again later."];
    header("Location: index.php");
    exit();
}

$stmt->close();
$conn->close();
?>
