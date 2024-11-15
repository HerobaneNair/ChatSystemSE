<?php

include 'connect.php';

session_start();

$uuid = $_SESSION["uuid"];
#$uuid = '1';

#SQL Statement Guide
#Creates a new table with only the entries associated to the user in chats.
#Then finds the uuid associated with them

$sql = "SELECT 
            c.chat_id AS chat_id,
            u.username AS username
        FROM 
            users u
        JOIN 
            (SELECT 
                CASE
                    WHEN user1_id = '$uuid' THEN user2_id
                    WHEN user2_id = '$uuid' THEN user1_id
                    ELSE NULL
                END AS chat_mem,
                chat_id
            FROM 
                chats
            WHERE 
                user1_id = '$uuid' OR user2_id = '$uuid') c
        ON 
            u.uuid = c.chat_mem
        ORDER BY 
            chat_id;";

$result = $conn->query($sql);

if ($result === false) {
    die("Error: " . $conn->error);
}

$message_array = array();

while ($row_values = $result->fetch_assoc()) {
    $str_output = "<option value=\"" . $row_values["chat_id"] . "\">" . $row_values["username"] . "</option>\n\t\t\t";
    $message_array[] = $row_values["chat_id"];
    echo $str_output;
}

$javascript_message_array = json_encode($message_array);

?>