<?php
require 'db.php'; // Make sure this connects to your care_system database

// Default users
$users = [
    ['admin', 'admin@care.com', 'admin123', 'admin'],
    ['dr_smith', 'drsmith@care.com', 'doctor123', 'doctor'],
    ['john_doe', 'johndoe@care.com', 'patient123', 'patient']
];

foreach ($users as $u) {
    $username = $u[0];
    $email = $u[1];
    $password = password_hash($u[2], PASSWORD_DEFAULT); // hash password
    $role = $u[3];

    // Insert into users table
    $stmt = $conn->prepare("INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $email, $password);
    $stmt->execute();
    $user_id = $stmt->insert_id;

    // Insert into doctors table if role is doctor
    if ($role === 'doctor') {
        $stmt2 = $conn->prepare("INSERT INTO doctors (user_id, full_name, specialization, phone, email, availability) 
                                 VALUES (?, ?, ?, ?, ?, ?)");
        $full_name = "Dr. John Smith";
        $specialization = "Cardiologist";
        $phone = "0300-1234567";
        $availability = "Mon-Fri 9AM-5PM";
        $stmt2->bind_param("isssss", $user_id, $full_name, $specialization, $phone, $email, $availability);
        $stmt2->execute();
    }

    // Insert into patients table if role is patient
    if ($role === 'patient') {
        $stmt3 = $conn->prepare("INSERT INTO patients (user_id, full_name, age, gender, phone, address, medical_history) 
                                 VALUES (?, ?, ?, ?, ?, ?, ?)");
        $full_name = "John Doe";
        $age = 28;
        $gender = "male";
        $phone = "0311-9876543";
        $address = "123 Main Street, Lahore";
        $medical_history = "No major medical history";
        $stmt3->bind_param("isissss", $user_id, $full_name, $age, $gender, $phone, $address, $medical_history);
        $stmt3->execute();
    }
}

echo "Default users added successfully!";
?>
