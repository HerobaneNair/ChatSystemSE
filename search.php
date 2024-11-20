<?php
include 'connect.php';

session_start();

$uuid = $_SESSION["uuid"];

$conn = new mysqli($servername, $username, $password, $dbname); 

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['username'])) {
    $searchTerm = $_GET['username'];

    // Fetch matching users
    $stmt = $conn->prepare("
        SELECT uuid, username 
        FROM Users 
        WHERE username LIKE CONCAT('%', ?, '%')
    ");
    $stmt->bind_param("s", $searchTerm);
    $stmt->execute();
    $result = $stmt->get_result();

    $users = [];
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
    $stmt->close();

    // Fetch chats and messages for each user
    foreach ($users as &$user) {
        $uuid = $user['uuid'];

        // Fetch chats
        $stmt = $conn->prepare("
            SELECT c.chat_id, u1.username AS user1, u2.username AS user2
            FROM Chats c
            JOIN Users u1 ON c.user1_id = u1.uuid
            JOIN Users u2 ON c.user2_id = u2.uuid
            WHERE c.user1_id = ? OR c.user2_id = ?
        ");
        $stmt->bind_param("ii", $uuid, $uuid);
        $stmt->execute();
        $chatsResult = $stmt->get_result();

        $chats = [];
        while ($chat = $chatsResult->fetch_assoc()) {
            $chatId = $chat['chat_id'];

            // Fetch messages for the chat
            $msgStmt = $conn->prepare("
                SELECT sender_id, content 
                FROM Message 
                WHERE chat_id = ?
            ");
            $msgStmt->bind_param("i", $chat_Id);
            $msgStmt->execute();
            $msgResult = $msgStmt->get_result();

            $messages = [];
            while ($message = $msgResult->fetch_assoc()) {
                $messages[] = $message;
            }
            $msgStmt->close();

            $chat['messages'] = $messages;
            $chats[] = $chat;
        }
        $stmt->close();

        $user['chats'] = $chats;
    }

    // Return JSON response
    header('Content-Type: application/json');
    echo json_encode($users);
    exit;
}
?>