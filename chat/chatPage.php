<?php
    session_start();
    $_SESSION['username'] = "user 1";
    $user2 = "user 2"
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Troc Carrot - chat</title>
    <link rel="stylesheet" href="chatPage.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>


<body>
<h1>You are chatting with <?php echo $user2?></h1>
<div id="messages"></div>
<div id="form">
    <textarea id="messageToSend"></textarea>
    <button id="button">Send</button>
</div>

<script>
    let usr1 = "<?php echo $_SESSION['username']; ?>";
    let usr2 = "<?php echo $user2; ?>"

    // function to get the message from the txt file
    function fetchMessages(){
        $.post("fetchMessages.php", {user1: usr1, user2: usr2},  function(data){

            let messages = data;
            messages = messages.replaceAll("\n", "<br>")
           $("#messages").html(messages);
        });
    }

    // Function to go to the bottom of the chat
    function scrollDown() {
        let messagesElem = document.getElementById('messages');
        messagesElem.scrollTop = messagesElem.scrollHeight - messagesElem.clientHeight;
    }

    // Function to save the message in the txt file
    document.getElementById("button").onclick = function(){

        let msg = document.getElementById("messageToSend").value;
        $.post("saveMessage.php", {message: msg, user1: usr1, user2: usr2}, function(data){
        });
        let messagesElem = document.getElementById('messages');
        fetchMessages();
        setTimeout(scrollDown, 500);
        clearContentMessage();
    };

    // function to clear the content of the message
    function clearContentMessage(){
        let messageToSend = document.getElementById('messageToSend');
        messageToSend.value = "";
    }

    // function to fetch every second
    setInterval(fetchMessages, 1000);

    // Function to push the send button by pushing
    let input = document.getElementById("messageToSend");
    input.addEventListener("keypress", function(event) {
        if (event.key === "Enter") {
            // Cancel the default action, if needed
            event.preventDefault();
            // Trigger the button element with a click
            document.getElementById("button").click();
        }
    });

</script>

</body>
</html>


