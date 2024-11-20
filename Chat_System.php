<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Application</title>
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.min.css">
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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

    <a href="search.html">
        <button>Search menu</button>
    </a>

    <a href="LogIn.html">
        <button>Logout</button>
    </a>

    <script>
        // Get the dropdown and chatBox elements
        const chatSelect = document.getElementById("chatSelect");
        const chatBox = document.getElementById("chatBox");

        // Function to update chatBox header and clear messages
        //This should be where i can put message history
        function updateChatBox() {
            chatBox.value = "Message history with: " + chatSelect.options[chatSelect.selectedIndex].text + "\n\n";
            var chatSelect_id = chatSelect.value;
            $.post('dropdown_read.php', {chat_id: chatSelect_id}, function(response) {
                const messages = JSON.parse(response);
                messages.forEach((message) => {
                    chatBox.value += message + "\n";
                });
            });
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
            chatBox.value += "\n" + <?php echo $_SESSION["username"]; ?> + ": " + sendBoxText;
            var chatStorage_id = chatSelect.value;
            var userid = <?php echo json_encode($_SESSION['uuid']);?>;
            //This is where the problem for saving to the database lies. Something is going wrong between here to the php file.
            console.log("Sending data:", { chat_id: chatStorage_id, uuid: userid, content: sendBoxText });
            $.post('message_storage.php', {chat_id: chatStorage_id, uuid: userid, content: sendBoxText}, function(response) {
                console.log("Response: ", response);
            });
            // Clear the sendBox after sending
            //This might be where i could put the message history as well
            document.getElementById('sendBox').value = '';
        });
    </script>
</body>
</html>