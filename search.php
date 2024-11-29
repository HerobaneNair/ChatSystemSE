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

// Check if user exists
$stmt = $conn->prepare("SELECT uuid FROM Users WHERE username = '$username'");
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $userId = $row['uuid'];

    // Check if chat exists
    $chatStmt = $conn->prepare("
        SELECT chat_id 
        FROM Chats 
        WHERE (user1_id = $currentUser AND user2_id = $userId) 
           OR (user1_id = $userId AND user2_id = $currentUser)
    ");
    $chatStmt->execute();
    $chatResult = $chatStmt->get_result();

    if ($chatResult->num_rows > 0) {
        echo json_encode(["exists" => true]);
    } else {
        echo json_encode(["validUser" => true]);
    }
} else {
    echo json_encode(["validUser" => false]);
}
exit; // Check if I exist
?>
