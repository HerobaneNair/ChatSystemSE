<?php

include 'connect.php';

session_start();

$chat_id = $_POST['chat_id'];
$uuid = $_SESSION['uuid'];
$content = $_POST['content'];

if (!$chat_id | !$uuid | $content) {
    echo 'ERROR: data not received';
}

/*
#Testing:
$chat_id = '1';
$uuid = '1';
$content = 'blahblah';
*/


#NOTE: To insert into database, you need to specify the primary key as null to auto-increment.
#This should be functional, using the dummy data will insert into the database.
$sql = "INSERT INTO Message (chat_id, sender_id, content)
        VALUES ('$chat_id', '$uuid', '$content')";

$result = $conn->query($sql);
echo 'Complete!';
#$verify_sql = "SELECT chat_id FROM Message WHERE '$chat_id' = ";

?>