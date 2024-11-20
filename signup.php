<?php

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
$cpsw = $_POST["cpsw"];

$sql = "SELECT `uuid` FROM `users` 
        WHERE `username` = '$uname'";
$result = $conn->query($sql);

echo gettype($result);
$tresult = mysqli_fetch_assoc($result);
echo "$tresult";

if ($psw != $cpsw){
    echo "PASSWORDS DO NOT MATCH";
}
if ($result->num_rows != 0) {
    echo "USERNAME TAKEN";
}
if ($psw == $cpsw and $result->num_rows == 0){
    $sql = "INSERT INTO MyGuests (username, password_hash)
    VALUES ('$uname', '$psw')";
    echo "YOU DID IT. LOG IN NOW";
}