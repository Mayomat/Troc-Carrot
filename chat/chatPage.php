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
<h1>You are chatting with <?php echo $user2?>;</h1>
<div id="messages"></div>
<div id="form">
    <textarea id="messageToSend"></textarea>
    <button id="button">Send</button>
</div>

<script>
    let usr1 = "<?php echo $_SESSION['username']; ?>";
    let usr2 = "<?php echo $user2; ?>"

    function fetchMessages(){
        $.post("fetchMessages.php", {user1: usr1, user2: usr2},  function(data){

            let messages = data;
            messages = messages.replaceAll("\n", "<br>")
           $("#messages").html(messages);
        });
    }

    function scrollDown() {
        let messagesElem = document.getElementById('messages');
        messagesElem.scrollTop = messagesElem.scrollHeight - messagesElem.clientHeight;
    }

    document.getElementById("button").onclick = function(){

        let msg = document.getElementById("messageToSend").value;
        $.post("saveMessage.php", {message: msg, user1: usr1, user2: usr2}, function(data){
        });
        let messagesElem = document.getElementById('messages');
        fetchMessages();
        setTimeout(scrollDown, 100);
        clearContentMessage();
    };

    function clearContentMessage(){
        let messageToSend = document.getElementById('messageToSend');
        messageToSend.value = "";
    }



    setInterval(fetchMessages, 1000);
</script>

</body>
</html>


