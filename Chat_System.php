<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Application</title>
</head>
<body>
    <dropdown>
        <title>Static Dropdown List</title>
        <label for="chatSelect">Chat Selection:</label>
        <select id="chatSelect">
            <?php include 'dropdown_constructor.php'; ?>
        </select>
    </dropdown>

    <br><br>

    <chatbox>
        <label for="chatBox">Message History with:</label>
        <textarea type="text" id="chatBox" name="chatBox" cols="75" rows="25" disabled></textarea>
        <br><br><br>
    </chatbox>

    <sendBox>
        <label for="textBox">Text Box:</label>
        <textarea type="text" id="sendBox" name="sendBox" cols="50" rows="1"></textarea>
        <button type="submit" id="submitBtn">Send</button>
    </sendBox>

    <script>
        // Get the dropdown and chatBox elements
        const chatSelect = document.getElementById("chatSelect");
        const chatBox = document.getElementById("chatBox");

        // Function to update chatBox header and clear messages
        //This should be where i can put message history
        function updateChatBox() {
            chatBox.value = "Message history with: " + chatSelect.options[chatSelect.selectedIndex].text + "\n\n";
            var chatSelect_id = chatSelect.selectedIndex;
            $.post('dropdown_read.php', {chat_id:chatSelect_id}, function(response)) {
                console.log(response);
            }
            var message_array = <?php include 'message_array.php'; ?>;
            message_array.forEach((message) => ) {
                chatBox.value += message + '\n';
            }
        }

        // Add a change event listener to clear and update chatBox based on selected user
        chatSelect.addEventListener("change", updateChatBox);

        // Initialize chatBox with the selected user's header on page load
        updateChatBox();

        // Send button functionality to add messages to chat history
        document.getElementById('submitBtn').addEventListener('click', function() {
            // Get the message from the sendBox
            var sendBoxText = document.getElementById('sendBox').value;

            // Append the text from sendBox to the chatBox
            //This should be where i can send from the text box to the database
            chatBox.value += "\n" + "UserID Placeholder" + ": " + sendBoxText;

            // Clear the sendBox after sending
            //This might be where i could put the message history as well
            document.getElementById('sendBox').value = '';
        });
    </script>
</body>
</html>