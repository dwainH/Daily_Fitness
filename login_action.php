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

// Retrieve the submitted username and password from the form
$username = $_POST['username'];
$password = $_POST['password'];

// Perform a query to check if the username and password exist in the database
$query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($connection, $query);

// Check if the query was successful
if ($result && mysqli_num_rows($result) > 0) {
    // Login successful
    echo 'Login successful!';
} else {
    // Login failed
    echo 'Invalid username or password.';
}

// Close the database connection
mysqli_close($connection);
?>