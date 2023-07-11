<?php
include 'db_connection.php';
session_start();

$username = $_SESSION['username'];
$new_weight = $_POST['weight'];
$new_height = $_POST['height'];
$new_age = $_POST['age'];


$getgender = "SELECT Gender FROM user WHERE username = '$username'";
$resultgender = mysqli_query($connection, $getgender);

$getActivityandWeightperWeek = "SELECT KgLossPerWeek, ActivityLevel FROM userplan WHERE username = '$username'";
$resultWeightActivity = mysqli_query($connection, $getActivityandWeightperWeek);
$userDataWeightActivity = mysqli_fetch_assoc($resultWeightActivity);
$WeightPerWeek = $userDataWeightActivity['KgLossPerWeek'];
$ActivityLevel = $userDataWeightActivity['ActivityLevel'];

$userDataGender = mysqli_fetch_assoc($resultgender);
$gender = $userDataGender['Gender'];

if ($gender === 'MALE') {
    $bmr = 66 + (6.23 * $new_weight) + (12.7 * $new_height) - (6.8 * $new_age);
} else {
    $bmr = 655 + (4.35 * $new_weight) + (4.7 * $new_height) - (4.7 * $age);
}


$resultUserId = mysqli_query($connection, "SELECT UserId FROM user WHERE username = '$username'");
if($resultUserId){
    if (mysqli_num_rows($resultUserId) > 0) {
        $rowUserId = mysqli_fetch_assoc($resultUserId);
        $userId = $rowUserId['UserId'];

        $calories = 1100;
        $DailyCalories = 0;

        // Calculate the daily calorie intake based on the selected options
        $caloriesLossPerDay = ($bmr - ($calories * $WeightPerWeek)) * $ActivityLevel;

        $DailyCalories = $bmr * $ActivityLevel;

        $updateUserPlanQuery = "UPDATE userplan SET CaloriesDeficitPerDay = '$caloriesLossPerDay', CaloriesBurnPerDay = '$DailyCalories' WHERE username = '$username'";
        $updateUserPlanResult = mysqli_query($connection, $updateUserPlanQuery);

        $updateUserDetails = "UPDATE user SET Weight = '$new_weight', Height = '$new_height' WHERE username = '$username'";
        $updateUserDetailsResults = mysqli_query($connection, $updateUserDetails);

        if ($updateUserDetailsResults) {
            echo "Userplan data updated successfully.";
            if ($updateUserPlanResult) {
                echo "Userplan data updated successfully.";
                header("Location:progress.php");
            } else {
                echo "Failed to update userplan data.";
            }
        } else {
            echo "Failed to update userplan data.";
        }
    }
}


?>