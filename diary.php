
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diary</title>
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
                <div class="user" onclick= "redirectToLogin()">
                    <img alt="usericon" id="user" src="images/user-circle-solid.svg">
                    <p id="user-text">LOGIN</p>
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
        </div>
        <div class="excercise-table">
            <div class="excercise-header">
                <h3 style="margin-right: 10px;">Excercise</h3>
                <img id="excercise-icon" alt="person running" src="images/person-running-solid.svg">
            </div>
        </div>
    </div>
    <div class="mental-container">
        <div class="mental-table">
            <div class="mental-header">
                <h3 style="margin-right: 10px;">Mental Health</h3>
                <img id="mental-icon" alt="mental" src="images/brain-solid.svg">
            </div>
        </div>
    </div>
   <script src="js/login.js"></script>
</body>
<script src="js/diary.js"></script>
</html>

