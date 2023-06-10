<?php
include 'db_connection.php';

// Retrieve the submitted username and password from the form
$username = $_POST['username'];
$password = $_POST['password'];

// Perform a query to check if the username and password exist in the database
$query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($connection, $query);

// Check if the query was successful
if ($result && mysqli_num_rows($result) > 0) {
    // Login successful
    echo ("<script>window.alert('Login Successfully')</script>");
    header("Location: index.php");
    exit();
} else {
    // Login failed
    echo ("<script>window.alert('Invalid username or password.')</script>");
}

// Close the database connection
mysqli_close($connection);
?>