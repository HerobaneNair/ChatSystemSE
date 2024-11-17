<?php
include 'connect.php';
session_start();

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
    exit;
}
if ($result->num_rows != 0) {
    echo "USERNAME TAKEN";
    exit;
}
if ($psw == $cpsw and $result->num_rows == 0){
    if (isset($_POST["uname"], $_POST["psw"])) {
        echo "Received data: uname = " . $_POST["uname"] . ", psw = " . $_POST["psw"];
    } else {
        echo "POST data not received properly";
        exit;
    }
    echo "YOU DID IT. LOG IN NOW";
}
$sql = "INSERT INTO Users (username, spassword_hash) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iis", $uname, $psw);

if ($stmt->execute()) {
    echo "User inserted successfully.";
} else {
    echo "Error inserting User: " . $stmt->error;
}
$stmt->close();
#$verify_sql = "SELECT chat_id FROM Message WHERE '$uname' = ";
