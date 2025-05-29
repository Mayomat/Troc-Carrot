<?php

    $message = $_POST["message"];
    $user1 = $_POST["user1"];
    $user2 = $_POST["user2"];

    if (file_exists("messages_" . $user2 ."_".$user1 .".txt")) {
        $myFile = fopen("messages_" . $user2 ."_".$user1 .".txt", "a");
    }
    else {
        $myFile = fopen("messages_" . $user1 ."_".$user2 .".txt", "a");
    }

    fwrite($myFile, $user1 . ": " . $message."\n");

    fclose($myFile);


