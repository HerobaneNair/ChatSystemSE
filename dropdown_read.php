<?php

session_start();

include 'connect.php';

$chat_id = $_POST['chat_id'];
#$chat_id = '1';

$sql = "SELECT `content` 
        FROM `message` 
        WHERE `chat_id` = '$chat_id'
        ORDER BY chat_id";

$result = $conn->query($sql);

if ($result === false) {
    die("Error: " . $conn->error);
}

$message_array = array();

while ($row_values = $result->fetch_assoc()) {
    $echo = $row_values['content'];
    $message_array[] = $row_values['content'];
}

$_SESSION['messages'] = json_encode($message_array);

?>