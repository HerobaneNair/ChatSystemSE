<?php

include 'connect.php';

session_start();

$chat_id = $_POST['chat_id'];

$sql = "SELECT `content` FROM `messages` 
        WHERE `chat_id` = '$chat_id'
        ORDER BY chat_id";

$result = $conn->query($sql);
$message_array = array();

while ($row_values = $result->fetch_assoc()) {
    $message_array[] = $row_values['content'];
}

$_SESSION['messages'] = json_encode($message_array);
