<?php
require 'db.php';

$email = "admin@care.com";
$password_plain = "admin123"; // set your admin login password
$password_hashed = password_hash($password_plain, PASSWORD_DEFAULT);

// delete any existing admin
$conn->query("DELETE FROM users WHERE email = '$email'");

// insert new admin with hashed password
$stmt = $conn->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)");
$name = "System Admin";
$role = "admin";
$stmt->bind_param("ssss", $name, $email, $password_hashed, $role);

if ($stmt->execute()) {
    echo "✅ Admin created!<br>Email: $email<br>Password: $password_plain";
} else {
    echo "❌ Error: " . $stmt->error;
}
