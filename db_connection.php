<?php
    // Assuming you have already established a database connection
    // Replace 'your_host', 'your_username', 'your_password', and 'your_database' with your actual database credentials

    /*$host = 'dbadmin';
    $username = 'B032010092';
    $password = '000626060161';
    $database = 'student_b032010092';*/

    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'daily_fitness';

    // Establish a connection to the MySQL database
    $connection = mysqli_connect($host, $username, $password, $database);

    // Check if the connection was successful
    if (!$connection) {
        die('Failed to connect to the database: ' . mysqli_connect_error());
    }
?>