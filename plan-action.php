<?php
// Include the database connection file
include 'db_connection.php';

session_start();

// Retrieve session variables
$username = $_SESSION['username'];

// Fetch user data from the user table
$query = "SELECT Name, Weight, Height, Gender, Age FROM user WHERE username = '$username'";
$result = mysqli_query($connection, $query);

if ($result && mysqli_num_rows($result) > 0) {
    // Retrieve the user data
    $userData = mysqli_fetch_assoc($result);
    
    // Extract the values
    $name = $userData['Name'];
    $weight = $userData['Weight'];
    $height = $userData['Height'];
    $gender = $userData['Gender'];
    $age = $userData['Age'];

    // Calculate the BMR
    if ($gender === 'MALE') {
        $bmr = 66 + (6.23 * $weight) + (12.7 * $height) - (6.8 * $age);
    } else {
        $bmr = 655 + (4.35 * $weight) + (4.7 * $height) - (4.7 * $age);
    }
    
} else {
    // Handle the case when no user data is found
    echo "No user data found.";
}

// Close the database connection
mysqli_close($connection);
?>