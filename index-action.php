<?php
// Include the database connection file
include 'db_connection.php';

session_start();

// Retrieve session variables
$username = $_SESSION['username'];

// Fetch user data from the user table
$query = "SELECT user.*, diary.TotalCalories AS currentCalories FROM user LEFT JOIN diary ON user.UserID = diary.UserID WHERE user.username = '$username'";
$result = mysqli_query($connection, $query);

if ($result && mysqli_num_rows($result) > 0) {
    // Retrieve the user data
    $userData = mysqli_fetch_assoc($result);

    // Extract the values
    $id = $userData['UserID'];
    $name = $userData['Name'];
    $pass = $userData['userpass'];
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

    // Check if currentCalories is set in the user data
    if (isset($userData['currentCalories'])) {
        $currentCal = $userData['currentCalories'];
    } else {
        $currentCal = 0;
    }
} else {
    // Handle the case when no user data is found
    echo "No user data found.";
}

// Close the database connection
mysqli_close($connection);
?>