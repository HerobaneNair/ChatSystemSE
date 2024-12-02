<?php

function attemptCheck() {
    if (isset($_SESSION['failed_attempts']) && !empty($_SESSION['failed_attempts'])) {
        $_SESSION['failed_attempts'] = $_SESSION['failed_attempts'] + 1;
    } else {
        $_SESSION['failed_attempts'] = 1;
    }
    return $_SESSION['failed_attempts'];
}

session_start();

include 'connect.php';

$uname = $_POST["uname"];
$psw = $_POST["psw"];

$sql = "SELECT `uuid` FROM `users` 
        WHERE `username` = '$uname' AND password_hash = '$psw'";

$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
    $tresult = mysqli_fetch_assoc($result);
    $_SESSION["uuid"] = $tresult["uuid"];
    $_SESSION["username"] = json_encode($uname);
    header('Location: Chat_System.php');
    exit;
} else {
    attemptCheck();
    header('Location: Login.html');
    exit;
}
#var_dump($uname, $psw);

?>