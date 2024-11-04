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

$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "chat_system";

$conn = mysqli_connect(
    $db_server,
    $db_user,
    $db_pass,
    $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$uname = $_POST["uname"];
$psw = $_POST["psw"];
$remember = $_POST["remember"];
$term = filter_input(INPUT_POST, "terms", FILTER_VALIDATE_BOOL);

$sql = "SELECT `uuid` FROM `users` 
        WHERE `username` = '$uname' AND password_hash = '$psw'";
$result = $conn->query($sql);

echo gettype($result);
$tresult = mysqli_fetch_assoc($result);
echo "$tresult";

if ($result->num_rows > 0) {
    $result = mysqli_fetch_assoc($result);
    echo $result;
    $_SESSION['uuid'] = "$result";
} else {
    attemptCheck();
    echo "Error, invalid username/pass";
}
#var_dump($uname, $psw, $remember);
