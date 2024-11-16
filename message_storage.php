<?php

include 'connect.php';

session_start();

$chat_id = $_POST['chat_id'];
$uuid = $_POST['uuid'];
$content = $_POST['content'];

if (isset($_POST['chat_id'], $_POST['uuid'], $_POST['content'])) {
    echo "Received data: chat_id = " . $_POST['chat_id'] . ", uuid = " . $_POST['uuid'] . ", content = " . $_POST['content'];
} else {
    echo "POST data not received properly";
    exit;
}

/*
#Testing:
$chat_id = '1';
$uuid = '1';
$content = 'blahblah';
*/


#NOTE: To insert into database, you need to specify the primary key as null to auto-increment.
#This should be functional, using the dummy data will insert into the database.
$sql = "INSERT INTO Message (chat_id, sender_id, content) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iis", $chat_id, $uuid, $content);

if ($stmt->execute()) {
    echo "Message inserted successfully.";
} else {
    echo "Error inserting message: " . $stmt->error;
}
$stmt->close();
#$verify_sql = "SELECT chat_id FROM Message WHERE '$chat_id' = ";

?>