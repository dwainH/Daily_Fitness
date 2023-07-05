<?php
include 'db_connection.php';
session_start();
$rating = $_POST['rating'];
$thoughts = $_POST['thoughts'];
$username = $_SESSION['username'];
$resultUserId = mysqli_query($connection, "SELECT UserId FROM user WHERE username = '$username'");
$getgender = "SELECT Gender FROM user WHERE username = '$username'";
$resultgender = mysqli_query($connection, $getgender);

$userData = mysqli_fetch_assoc($resultgender);
$gender = $userData['Gender'];



if ($resultUserId) {
    // Check if any rows were returned
    if (mysqli_num_rows($resultUserId) > 0) {
        $rowUserId = mysqli_fetch_assoc($resultUserId);
        $userId = $rowUserId['UserId'];
        $insertFeedback = $connection->prepare("INSERT INTO feedback (UserId, Star, Remarks) VALUES (?, ?, ?)");
        $insertFeedback->bind_param('sss', $userId, $rating, $thoughts);
        $insertFeedback->execute();
        $insertFeedback->close();
        $_SESSION['thankyou_message'] = true; // Set a session variable for thank you message
        header('Location: feedback.php');
        exit();
    } else {
        echo "No user found with the provided username.";
    }
} else {
    echo "Query failed: " . mysqli_error($connection);
}
?>
