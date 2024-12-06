<?php
include 'connect.php';

function test_signup($conn) {
    $testUsername = "TestUser_" . rand(1000, 9999);
    $testPassword = "TestPassword";
    $sql = "INSERT INTO Users (username, password_hash) VALUES ('$testUsername', '$testPassword')";
    $result = $conn->query($sql);

    if ($result) {
        return ["status" => "success", "message" => "Signup Test Passed: User $testUsername created."];
    } else {
        return ["status" => "failure", "message" => "Signup Test Failed: " . $conn->error];
    }
}

function test_login($conn) {
    $testUsername = "ExistingUser";
    $testPassword = "ExistingPassword";
    $sql = "SELECT uuid FROM Users WHERE username = '$testUsername' AND password_hash = '$testPassword'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return ["status" => "success", "message" => "Login Test Passed: User $testUsername logged in."];
    } else {
        return ["status" => "failure", "message" => "Login Test Failed: User $testUsername not found or password incorrect. (Might need to reset password)"];
    }
}

function test_reset_password($conn) {
    $testUsername = "ExistingUser";
    $newPassword = "NewPassword123";
    $sql = "UPDATE Users SET password_hash = '$newPassword' WHERE username = '$testUsername'";
    $result = $conn->query($sql);

    if ($result) {
        return ["status" => "success", "message" => "Reset Password Test Passed: Password updated for $testUsername."];
    } else {
        return ["status" => "failure", "message" => "Reset Password Test Failed: " . $conn->error];
    }
}

function test_send_message($conn) {
    $chatId = 1;
    $senderId = 1;
    $message = "Test message at " . date("Y-m-d H:i:s");
    $sql = "INSERT INTO Message (chat_id, sender_id, content) VALUES ($chatId, $senderId, '$message')";
    $result = $conn->query($sql);

    if ($result) {
        return ["status" => "success", "message" => "Send Message Test Passed: Message sent to chat_id $chatId."];
    } else {
        return ["status" => "failure", "message" => "Send Message Test Failed: " . $conn->error];
    }
}

function test_search_user($conn) {
    $username = "ExistingUser";
    $sql = "SELECT uuid FROM Users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return ["status" => "success", "message" => "Search User Test Passed: User $username found."];
    } else {
        return ["status" => "failure", "message" => "Search User Test Failed: User $username not found."];
    }
}

function reset_existing_user_password($conn) {
    $testUsername = "ExistingUser";
    $newPassword = "ExistingPassword";
    $sql = "UPDATE Users SET password_hash = '$newPassword' WHERE username = '$testUsername'";
    $result = $conn->query($sql);

    if ($result) {
        return ["status" => "success", "message" => "Reset Existing User Password Test Passed: Password reset to $newPassword for $testUsername."];
    } else {
        return ["status" => "failure", "message" => "Reset Existing User Password Test Failed: " . $conn->error];
    }
}

$request = json_decode(file_get_contents('php://input'), true);

if (isset($request['test'])) {
    $testName = $request['test'];
    $response = ["status" => "failure", "message" => "Invalid test name."];

    switch ($testName) {
        case 'Signup':
            $response = test_signup($conn);
            break;
        case 'Login':
            $response = test_login($conn);
            break;
        case 'ResetPassword':
            $response = test_reset_password($conn);
            break;
        case 'SendMessage':
            $response = test_send_message($conn);
            break;
        case 'SearchUser':
            $response = test_search_user($conn);
            break;
        case 'ResetExistingUser':
            $response = reset_existing_user_password($conn);
            break;
    }

    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
} else {
    echo json_encode(["status" => "failure", "message" => "Invalid request."]);
    exit;
}
?>
