<?php
// Include the database connection file
include 'db_connection.php';

// Retrieve form data
$name = $_POST['name'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$height = $_POST['height'];
$weight = $_POST['weight'];
$username = $_POST['username'];
$password = $_POST['password'];

// Insert data into the user table
$query = "INSERT INTO user (username, userpass, Name, Age, Gender, Weight, Height)
          VALUES ('$username', '$password', '$name', '$age', '$gender', '$weight', '$height')";

if (mysqli_query($connection, $query)) {
    echo '<script>alert("Registration successful!");</script>';

    // Start a session
    session_start();
    
    // Store user information in session variables
    $_SESSION['username'] = $username;

    header("Location: plan.php");
    exit();
} else {
    $error_message = mysqli_error($connection);
    $error_code = mysqli_errno($connection);
    echo '<script>alert("Registration failed. Error: ' . $error_message . ' (Error Code: ' . $error_code . ')");</script>';
}

// Close the database connection
mysqli_close($connection);
?>
