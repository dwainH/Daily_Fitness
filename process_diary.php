<?php
// Include the database connection file
include 'db_connection.php';
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    // Retrieve the form data
    $username = $_SESSION['username'];
    $userIDQuery = mysqli_query($connection, "SELECT UserId FROM user WHERE username = '$username'");
    $row = mysqli_fetch_assoc($userIDQuery);
    $userID = $row['UserId'];
    $entryType = $_POST["entry_type"];
    $totalCalories = $_POST["totalCalories"];
    $foodID = $_POST["foodID"];
    $exerciseID = $_POST["exerciseID"];
    $exerciseMinutes = $_POST["exerciseMinutes"];
    $mentalName = $_POST["mentalName"];
    $symptomsMental = $_POST["symptomsMental"];

    // Perform further validations and sanitizations as needed

    // Insert the data into the diary table
    $diaryQuery = "INSERT INTO diary (userID, TotalCalories, FoodID, ExerciseID, timeTakenExs) VALUES ('$userID', '$totalCalories', '$foodID', '$exerciseID', '$exerciseMinutes')";
    mysqli_query($connection, $diaryQuery);

    // Insert the data into the mental health table only if mental health information is provided
    if (!empty($mentalName) && !empty($symptomsMental)) {
        $mentalQuery = "INSERT INTO mental (userID, Name, Symptom) VALUES ('$userID', '$mentalName', '$symptomsMental')";
        mysqli_query($connection, $mentalQuery);
    }

    $successMessage = "Entry submitted successfully!";

    // Handle different entry types (food or exercise)
    /*if ($entryType == "food") {
        // Insert the data into the food entry table
        $foodQuery = "INSERT INTO food_entry (userID, foodID, date) VALUES ('$userID', '$foodID', '$date')";
        mysqli_query($connection, $foodQuery);
    } elseif ($entryType == "exercise") {
        // Calculate the calories burned from exercise for the given minutes
        $exerciseQuery = "SELECT CaloriesBurnPerMin FROM exercise WHERE ExerciseID = '$exerciseID'";
        $exerciseResult = mysqli_query($connection, $exerciseQuery);
        $row = mysqli_fetch_assoc($exerciseResult);
        $caloriesBurnPerMin = $row["CaloriesBurnPerMin"];
        $caloriesBurnExercise = $exerciseMinutes * $caloriesBurnPerMin;

        // Insert the data into the exercise entry table
        $exerciseEntryQuery = "INSERT INTO exercise_entry (userID, exerciseID, exerciseMinutes, caloriesBurned) VALUES ('$userID', '$exerciseID', '$exerciseMinutes', '$caloriesBurnExercise')";
        mysqli_query($connection, $exerciseEntryQuery);
    }*/

    // Redirect or perform further actions as needed
    // Example: Redirect to a success page
    echo "<script>showToast('$successMessage');</script>";
    header("Location: diary.php");
    exit();
}

// Close the database connection
mysqli_close($connection);
?>