
<html lang="en">
<head>
    <?php include 'index-action.php'; ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Progress</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <header>
        <nav class="nav-bar">
            <ul>
                <a href="index.php"><img id="company_logo" src="images/logo.png" alt="logo pic"></a>
                <li class="dropdown active">Progress<img id="greater-than" src="images/greater-than-solid.svg">
                    <div class="dropdown-menu">
                        <ul>
                            <a href="index.php"><li>Dashboard</li></a>
                            <a href="diary.php"><li>Diary</li></a>
                            <a class="active" href="progress.php"><li>Progress</li></a>
                            <a href="recommended.php"><li>Recommended</li></a>
                        </ul>
                    </div>
                   </li> 
                   <li><a href="newsfeed.php">Newsfeed</a></li>
                   <li><a href="feedback.php">Feedback</a></li>
                   <div class="user" onclick= "redirectToLogin()">
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
    <div class="progress-container">
        <img id="personsolid" alt="person icon" src="images/person-solid.svg">
        <div  class="goal-calorie">
            <h3>Goal:
            <?php
                echo $calorieGoals;
            ?>    
            Calories/Day</h3>
            <h4>Current Calories:
                <?php
                    echo $bmr;
                ?>
            </h4>
            <div class="calorie-bar">
                <div class="bar" style="width: 50%;"></div>
            </div>
            <h4>Calories Needed:
                <?php
                    echo $calorieGoals - $bmr;
                ?>
            </h4>
        </div>
        <div class="vertical-line">
        </div>
        <a type="button" href="#update-weightandheight">Update progress</a>
    </div>
    <h2 id="update-text">Update Your Weight and Height here</h2>
    <form action="progress-action.php" method="POST">
    <div id="update-weightandheight" class="weightandheight-container">   
        <input type="text" id="weight-input" name="weight" class="borderless-input" placeholder="Weight(Kg)">
        <div class="height-input" style="width:100%">
            <input type="text" name="height" id="height-input" class="borderless-input" placeholder="Height(cm)">
            <span id="tooltip" title="Just in case you've grown taller"><i class="fas fa-exclamation"></i></span>
        </div>
        <input type="text" id="age-input" name="age" class="borderless-input" placeholder="Age(years)">
        <button id="confirm-weightandheight" type="submit">Confirm</button>
    </div>
    <form>
    <script src="js/login.js"></script>
</body>
</html>

