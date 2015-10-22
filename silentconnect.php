<?php
    // A simple PHP script demonstrating how to connect to MySQL.
    // Press the 'Run' button on the top to start the web server,
    // then click the URL that is emitted to the Output tab of the console.

    $servername = "us-cdbr-azure-west-c.cloudapp.net";
    $username = "bd8d497552b1b6";
    $password = "8b66e8a6";
    $database = "mywikirAmWPP81F5";
    $dbport = 3306;

    // Create connection
    $db = new mysqli($servername, $username, $password, $database, $dbport);

?>