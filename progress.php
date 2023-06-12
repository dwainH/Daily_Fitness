
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Progress</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
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
                    <img alt="usericon" id="user" src="images/user-circle-solid.svg">
                    <p id="user-text">LOGIN</p>
                </div>
            </ul>
        </nav>
    </header>
    <div class="progress-container">
        <img id="personsolid" alt="person icon" src="images/person-solid.svg">
        <div  class="goal-calorie">
            <h3>Goal:2000 Calories/Day</h3>
            <h4>Current Calories:1000</h4>
            <div class="calorie-bar">
                <div class="bar" style="width: 50%;"></div>
            </div>
            <h4>Calories Needed:1000</h4>
        </div>
        <div class="vertical-line">
        </div>
        <a type="button" href="#update-weightandheight">Update progress</a>
    </div>
    <h2 id="update-text">Update Your Weight and Height here</h2>
    <div id="update-weightandheight" class="weightandheight-container">
        <input type="text" id="weight-input" class="borderless-input" placeholder="Weight(Kg)">
        <input type="text" id="height-input" class="borderless-input" placeholder="Height(cm)">
        <a id="confirm-weightandheight" type="button">Confirm</a>
    </div>
    <script src="js/login.js"></script>
</body>
</html>

