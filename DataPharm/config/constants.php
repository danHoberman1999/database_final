<?php

        // Start Session
        session_start();

        //Create Constants To Store None Repeating Values
        define('SITEURL', 'http://localhost/DataPharm/');
        define('LOCALHOST', 'localhost');
        define('DB_USERNAME', 'root');
        define('DB_PASSWORD', '');
        define('DB_NAME', 'data-pharm');

        // Execute Query and save data in database
        $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD); //Database Connection
        $db_select = mysqli_select_db($conn, DB_NAME); //Selecting Database

?>