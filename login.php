<?php
session_start();
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, name, password, role FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['role'] = $user['role'];

            // Redirect based on role
           if ($user['role'] === 'admin') {
    header("Location: Admin/admin_dashboard.php");
} elseif ($user['role'] === 'doctor') {
    header("Location: doctor/doctor_dashboard.php");
} elseif ($user['role'] === 'patient') {
    header("Location: patient/patient_dashboard.php");
} else {
    header("Location: profile.php"); // fallback
}
exit();

        } else {
            echo "Invalid password!";
        }
    } else {
        echo "No user found with this email.";
    }
}
?>
