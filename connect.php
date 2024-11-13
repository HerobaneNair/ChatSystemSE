<?php

#Database connection info
$db_server = "softwaregooper.mysql.database.azure.com";
$db_user = "softwaregooper";
$db_pass = "Ihabissomeone1";
$db_name = "Chat_System";

/*
$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "chat_system";
*/

$conn = mysqli_connect(
    $db_server, 
    $db_user,
    $db_pass,
    $db_name
);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>