<?php

    //database configuration
    $host       = "localhost";
    $user       = "root";
    $pass       = "";
    $database   = "helpdesk_api";

    $conn = new mysqli($host, $user, $pass, $database);

    if (!$conn) {
        die ("connection failed: " . mysqli_connect_error());
    } else {
        $conn->set_charset('utf8');
    }

?>
