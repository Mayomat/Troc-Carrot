<?php

    $message = $_POST["message"];
    $user1 = $_POST["user1"];
    $user2 = $_POST["user2"];

    $myFile = fopen("messages_" . $user1 ."_".$user2 .".txt", "a");

    fwrite($myFile, $user1 . ": " . $message."\n");

    fclose($myFile);


