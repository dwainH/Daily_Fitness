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

    // Get the selected weight loss per week and activity level from the form
    if (isset($_POST['WeightPerWeek']) && isset($_POST['ActivityLevel'])) {
        $calories = 1100;
        $weightPerWeek = $_POST['WeightPerWeek'];
        $activityLevel = $_POST['ActivityLevel'];

        // Calculate the daily calorie intake based on the selected options
        $caloriesLossPerDay = ($bmr - ($calories * $weightPerWeek)) * $activityLevel;

        // Display the calculated daily calorie intake
        echo "Daily Calories Intake: " . $caloriesLossPerDay;
    } else {
        // Handle the case when the form data is not set
        echo "Please select the weight loss per week and activity level.";
    }

} else {
    // Handle the case when no user data is found
    echo "No user data found.";
}

// Close the database connection
mysqli_close($connection);
?>