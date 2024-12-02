<?php
include 'connect.php';

$username = $_POST["uname"];
$newPassword = $_POST["psw"];
$confirmPassword = $_POST["cpsw"];

// Check if passwords match
if ($newPassword !== $confirmPassword) {
    echo "<script type='text/javascript'>alert('Passwords do not match'); window.location.href = 'forgot.html';</script>";
    exit;
}

// Check if username exists
$sql = "SELECT `uuid` FROM `users` WHERE `username` = '$username'";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    echo "<script type='text/javascript'>alert('That username does not exist'); window.location.href = 'forgot.html';</script>";
    exit;
}

// Update password
$updateSql = "UPDATE `users` SET `password_hash` = '$newPassword' WHERE `username` = '$username'";
if ($conn->query($updateSql) === TRUE) {
    echo "<script type='text/javascript'>alert('Password changed'); window.location.href = 'Login.html';</script>";
} else {
    echo "<script type='text/javascript'>alert('Error updating password. Please try again.'); window.location.href = 'forgot.html';</script>";
}

$conn->close();
?>
