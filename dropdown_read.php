<?php

session_start();

include 'connect.php';

$chat_id = $_POST['chat_id'];
#$chat_id = '1';

$sql = "SELECT 
            Message.content,
            Users.username
        FROM 
            Message
        INNER JOIN Users on Message.sender_id = Users.uuid
        WHERE Message.chat_id = '$chat_id'";


/*
$sql = "SELECT `content` 
        FROM `message` 
        WHERE `chat_id` = '$chat_id'
        ORDER BY chat_id";
*/
$result = $conn->query($sql);

$message_array = array();

if ($result) {
    while ($row_values = $result->fetch_assoc()) {

        $message_array[] = $row_values['username'] . ': ' . $row_values['content'];
    }
    echo json_encode($message_array);
} else {
    echo json_encode([]);
}

?>