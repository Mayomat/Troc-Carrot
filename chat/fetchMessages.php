<?php

    $user1 = $_POST["user1"];
    $user2 = $_POST["user2"];

    if (file_exists("messages_" . $user2 ."_".$user1 .".txt")) {
        echo file_get_contents("messages_" . $user2 ."_".$user1 .".txt");
    }
    else {
        $myFile = fopen("messages_" . $user1 ."_".$user2 .".txt", "a");
        fclose($myFile);
        echo file_get_contents("messages_" . $user1 ."_".$user2 .".txt");
    }
