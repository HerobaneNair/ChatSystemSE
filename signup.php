<?php
include 'connect.php';
session_start();

$uname = $_POST["uname"];
$psw = $_POST["psw"];
$cpsw = $_POST["cpsw"];

$sql = "SELECT `uuid` FROM `users` 
        WHERE `username` = '$uname'";
$result = $conn->query($sql);

$tresult = mysqli_fetch_assoc($result);

if ($psw != $cpsw) {
    echo "<script type='text/javascript'>alert('Passwords do not match'); window.location.href = 'SignupForm.html';</script>";
    exit;
}
if ($result->num_rows != 0) {
    echo "<script type='text/javascript'>alert('That username already exists'); window.location.href = 'SignupForm.html';</script>";
    exit;
}

if (isset($_POST["uname"], $_POST["psw"])) {
    $sql = "INSERT INTO Users (username, password_hash) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $uname, $psw);

    if ($stmt->execute()) {
        echo "<script type='text/javascript'>alert('Signup successful! You can log in now.'); window.location.href = 'Login.html';</script>";
        exit;
    } else {
        echo "<script type='text/javascript'>alert('Error during signup. Please try again.'); window.location.href = 'SignupForm.html';</script>";
        exit;
    }
} else {
    echo "<script type='text/javascript'>alert('Invalid input. Please try again.'); window.location.href = 'SignupForm.html';</script>";
    exit;
}
?>
