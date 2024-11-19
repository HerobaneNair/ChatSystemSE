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
    $message = "PASSWORDS DO NOT MATCH";
    echo "<script type='text/javascript'>alert('$message');</script>";
    header('Location: SignupForm.html');
    exit;
}
if ($result->num_rows != 0) {
    $message = "USERNAME TAKEN";
    echo "<script type='text/javascript'>alert('$message');</script>";
    header('Location: SignupForm.html');
    exit;
}
if ($psw == $cpsw and $result->num_rows == 0){
    if (isset($_POST["uname"], $_POST["psw"])) {
        echo "Received data: uname = " . $_POST["uname"] . ", psw = " . $_POST["psw"];
    } else {
        $message = "POST data not received properly";
        echo "<script type='text/javascript'>alert('$message');</script>";
        header('Location: SignupForm.html');
        exit;
    }
    $message = "YOU DID IT. LOG IN NOW";
    echo "<script type='text/javascript'>alert('$message');</script>";
}
$sql = "INSERT INTO Users (username, password_hash) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param('ss', $uname, $psw);

if ($stmt->execute()) {
    echo "User inserted successfully.";
} else {
    echo "Error inserting User: " . $stmt->error;
}
$stmt->close();
header('Location: Login.html');
exit;
#$verify_sql = "SELECT chat_id FROM Message WHERE '$uname' = ";
