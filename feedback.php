
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/8ddaffcb2b.js"></script>
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
                <li><a href="newsfeed.php">Newsfeed</a></li>
                <li class="active"><a href="feedback.php">Feedback</a></li>
                <div class="user">
                    <img alt="usericon" id="user" src="images/user-circle-solid.svg">
                    <p id="user-text">LOGIN</p>
                </div> 
            </ul>
        </nav>
    </header>
    <div class="addition-container">
        <h2>How do you rate our website?</h2>
        <div class="star-row">          
            <i id="1-star" class="fa-solid fa-star fa-2xl" style="color: #3e3e3e;"></i>     
            <i id="2-star" class="fa-solid fa-star fa-2xl" style="color: #3e3e3e;"></i>     
            <i id="3-star" class="fa-solid fa-star fa-2xl" style="color: #3e3e3e;"></i>     
            <i id="4-star" class="fa-solid fa-star fa-2xl" style="color: #3e3e3e;"></i>     
            <i id="5-star" class="fa-solid fa-star fa-2xl" style="color: #3e3e3e;"></i>   
        </div>
        <div class="face" id="face">
        </div> 
     </div>
     <div class="feedback-container">
        <form id="feedback-form" method="POST" action="process-feedback.php">
          <h2>What do you think we should add?</h2>
          <textarea id="thoughts" name="thoughts" placeholder="Type your thoughts here"></textarea>
          <button id="submit" type="submit">Submit</button>
        </form>
      </div>
    <script src="js/feedback.js"></script>
</body>
</html> 

