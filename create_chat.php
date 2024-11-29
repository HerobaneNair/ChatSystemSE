<?php
include 'connect.php';
session_start();

$currentUser = $_SESSION['uuid'];
$request = json_decode(file_get_contents('php://input'), true);

if (!isset($currentUser)) {
    echo json_encode(["error" => "User not logged in"]);
    exit;
}

if (!isset($request['username'])) {
    echo json_encode(["error" => "No username provided"]);
    exit;
}

$username = $request['username'];

// Get user ID of the user in text box
$stmt = $conn->prepare("SELECT uuid FROM Users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows === 0) {
    echo json_encode(["error" => "User not found"]);
    exit;
}

$userRow = $result->fetch_assoc();
$targetUserId = $userRow['uuid'];

// Create chat
$chatStmt = $conn->prepare("INSERT INTO Chats (user1_id, user2_id) VALUES (?, ?)");
$chatStmt->bind_param("ii", $currentUser, $targetUserId);
if (!$chatStmt->execute()) {
    echo json_encode(["error" => "Failed to create chat"]);
    exit;
}

// Get chat ID
$chatId = $chatStmt->insert_id;

// Insert the contacted you message
$message = "$_SESSION[username] contacted you!";
$messageStmt = $conn->prepare("INSERT INTO Message (chat_id, sender_id, content) VALUES (?, ?, ?)");
$messageStmt->bind_param("iis", $chatId, $currentUser, $message); 

if ($messageStmt->execute()) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["error" => "Failed to send message"]);
}
exit;
?>
