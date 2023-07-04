
<html lang="en">
<head>
<?php include 'index-action.php'; ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Newsfeed</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <nav class="nav-bar">
            <ul>
                <a href="index.php"><img id="company_logo" src="images/logo.png" alt="logo pic"></a>
                <li class="dropdown">Dashboard<img id="greater-than" src="images/greater-than-solid.svg">
                    <div class="dropdown-menu">
                        <ul>
                            <a href="index.php"><li>Dashboard</li></a>
                            <a href="diary.php"><li>Diary</li></a>
                            <a href="progress.php"><li>Progress</li></a>
                            <a href="recommended.php"><li>Recommended</li></a>
                        </ul>
                    </div>
                   </li> 
                <li class="active"><a href="newsfeed.php">Newsfeed</a></li>
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
    
    <div id="article-container">
        <!--Article from newsAPI is retrieved and put in here-->
    </div>
    <script src="js/news.js"></script>
    <script src="js/login.js"></script>
</body>
</html>

