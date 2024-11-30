<?php
session_start();
include 'connect.php';

$uname = $_POST["uname"];
$psw = $_POST["psw"];

$sql = "SELECT `uuid`, `password_hash` FROM `users` WHERE `username` = '$uname'";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    echo "<script type='text/javascript'>alert('That username does not exist'); window.location.href = 'Login.html';</script>";
    exit;
}

$tresult = mysqli_fetch_assoc($result);
if ($tresult['password_hash'] != $psw) {
    $_SESSION['failed_attempts'] = ($_SESSION['failed_attempts'] ?? 0) + 1;
    echo "<script type='text/javascript'>alert('Incorrect password. You have a few attempts remaining'); window.location.href = 'Login.html';</script>";
    exit;
}

$_SESSION["uuid"] = $tresult["uuid"];
$_SESSION["username"] = $uname;

echo "<script type='text/javascript'>alert('Login successful!'); window.location.href = 'Chat_System.php';</script>";
exit;
?>
