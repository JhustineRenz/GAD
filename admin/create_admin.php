<?php
require_once '../config.php';

$admin_name = 'Riazel Lipata';
$username = 'Yazirayz';
$password = password_hash('June172003_RL', PASSWORD_BCRYPT);

$stmt = $conn->prepare("INSERT INTO admin_accounts (admin_name, username, password) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $admin_name, $username, $password);

if ($stmt->execute()) {
    echo "Admin account created successfully!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
