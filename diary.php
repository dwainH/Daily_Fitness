<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diary</title>
    <?php include 'index-action.php'; ?>
    <?php include 'db_connection.php'; ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <nav class="nav-bar">
            <ul>
                <a href="index.php"><img id="company_logo" src="images/logo.png" alt="logo pic"></a>
                <li class="dropdown active">Diary<img id="greater-than" src="images/greater-than-solid.svg">
                    <div class="dropdown-menu">
                        <ul>
                            <a href="index.php"><li>Dashboard</li></a>
                            <a class="active" href="diary.php"><li>Diary</li></a>
                            <a href="progress.php"><li>Progress</li></a>
                            <a href="recommended.php"><li>Recommended</li></a>
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
                        echo '<img alt="usericon" id="user" src="images/user-circle-solid.svg">';
                        echo '<p id="user-text">LOGIN</p>';
                    }
                    ?>
                </div>
            </ul>
        </nav>
    </header>
    
    <div class="info">
        <h3>Keep track of your habits here!</h2>
        <div class="current-date">
            <h3 style="margin-right: 10px;"><b>DATE:</b></h3>
            <h3 id="date"><strong></strong></h3>
        </div> 
    </div>
    <div class="excercise-food-container">
        <div class="food-table">
            <div class="food-header">
                <h3 style="margin-right:10px">Food</h3>
                <img id="food-icon" alt="fork and knife" src="images/utensils-solid.svg">
            </div>
            <div class = "exercise-dropdown">
                <form action="process_diary.php" method="POST">
                    <input type="hidden" name="entry_type" value="food">
                    <label for="food">Food:</label>
                    <select id="food" name="food">
                        <?php
                        // Fetch food options from the database
                        // Adjust the database connection code and query according to your setup
                        $foodOptionsQuery = "SELECT CONCAT(`Name`, ' - ', `Calories`) AS food_with_calories FROM `food`";
                        $foodOptionsResult = mysqli_query($connection, $foodOptionsQuery);
                        while ($row = mysqli_fetch_assoc($foodOptionsResult)) {
                            $foodName = $row['food_with_calories'];
                            echo "<option value='$foodName'>$foodName</option>";
                        }
                        ?>
                    </select>
                    <input type="submit" value="Submit">
                </form>
            </div>
        </div>
        <div class="excercise-table">
            <div class="excercise-header">
                <h3 style="margin-right: 10px;">Exercise</h3>
                <img id="excercise-icon" alt="person running" src="images/person-running-solid.svg">
            </div>
            <div class = "exercise-dropdown">
                <form action="process_diary.php" method="POST">
                    <input type="hidden" name="entry_type" value="exercise">
                    <label for="exercise">Exercise:</label>
                    <select id="exercise" name="exercise">
                        <?php
                        // Fetch exercise options from the database
                        // Adjust the database connection code and query according to your setup
                        $exerciseOptionsQuery = "SELECT CONCAT(`Name`, ' - ', `CaloriesBurnPerMin`) AS exercise_with_calBurn FROM `exercise`";
                        $exerciseOptionsResult = mysqli_query($connection, $exerciseOptionsQuery);
                        while ($row = mysqli_fetch_assoc($exerciseOptionsResult)) {
                            $exerciseName = $row['exercise_with_calBurn'];
                            echo "<option value='$exerciseName'>$exerciseName</option>";
                        }
                        ?>
                    </select>
                    <input type="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>
    <div class="mental-container">
        <div class="mental-table">
            <div class="mental-header">
                <h3 style="margin-right: 10px;">Mental Health</h3>
                <img id="mental-icon" alt="mental" src="images/brain-solid.svg">
            </div>
            <div class="form-mental">
                <input type="text" id="mentalName" name="mentalName" required placeholder="Name of mental illness">
            </div>
            <div class="form-mental">
                <input type="text" id="symptomsMental" name="symptomsMental" required placeholder="Your symptoms">
            </div>
        </div>
    </div>
   <script src="js/login.js"></script>
</body>
<script src="js/diary.js"></script>
<script>
    function redirectToLogin() {
        window.location.href = "login.php";
    }

    function redirectToProfile() {
        // Add your logic to redirect to the user's profile page
    }
</script>
</html>
