<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <?php include 'index-action.php'; ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body onload="replaceRandomQuote()">
    <header>
        <nav class="nav-bar">
            <ul>
                <a href="index.php"><img id="company_logo" src="images/logo.png" alt="logo pic"></a>
                <li class="dropdown active">Dashboard<img id="greater-than" src="images/greater-than-solid.svg">
                    <div class="dropdown-menu">
                        <ul>
                            <a class="active" href="index.php">
                                <li>Dashboard</li>
                            </a>
                            <a href="diary.php">
                                <li>Diary</li>
                            </a>
                            <a href="progress.php">
                                <li>Progress</li>
                            </a>
                            <a href="recommended.php">
                                <li>Recommended</li>
                            </a>
                        </ul>
                    </div>
                </li>
                <li><a href="newsfeed.php">Newsfeed</a></li>
                <li><a href="feedback.php">Feedback</a></li>
                <div class="user">
                    <?php
                    if (isset($name) && isset($age)) {
                       // echo '<img alt="usericon" id="user" src="' . $age . '">';
                        echo '<img alt="usericon" id="user" src="images/user-circle-solid.svg">';
                        echo '<p id="user-text">' . $age . '</p>';
                        echo '<p id="user-text">' . $name . '</p>';
                        echo '<a href="logout.php" id="logout-btn">Logout</a>';
                    } else {
                        header("Location:login.php");
                    }
                    ?>
                </div>
            </ul>
        </nav>
    </header>
    <div class="container">
        <h1 id="container-title"><u>DASHBOARD</u></h1>
        <hr>
        <div class="goals">
            <div class="calorie-goal">
                <h3>DAILY CALORIES GOALS:</h3>
                <h3 id="calorie-data"><?php echo $calorieGoals; ?> cals</h3>
            </div>
            <div class="balance">
                <h3>TOTAL BALANCE:</h3>
                <h3 id="balance-data"><?php echo $bmr; ?> cals</h3>
            </div>
        </div>
        <div class="quote">
            <h3>DAILY QUOTE:</h3>
            <h3 id="random-quote"><i>-</i></h3>
        </div>
    </div>
</body>
<script src="js/index.js"></script>
<script>
    function redirectToLogin() {
        window.location.href = "login.php";
    }

    function redirectToProfile() {
        // Add your logic to redirect to the user's profile page
    }
</script>

</html>