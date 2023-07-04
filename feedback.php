
<html lang="en">
<head>
<?php include 'index-action.php'; ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/8ddaffcb2b.js"></script>
</head>
<!-- Your HTML code for the feedback.php page -->

<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


if (isset($_SESSION['thankyou_message']) && $_SESSION['thankyou_message']) {
    echo '<script>alert("Thank you for your feedback!");</script>';
    unset($_SESSION['thankyou_message']); // Reset the session variable
}
?>

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
        <form id="feedback-form" method="POST" action="feedback-action.php">
          <h2>What do you think we should add?</h2>
          <input type="hidden" id="rating-input" name="rating" value="0">
          <textarea id="thoughts" name="thoughts" placeholder="Type your thoughts here"></textarea>
          <button id="submit" type="submit">Submit</button>
        </form>
    </div>
    <script src="js/login.js"></script>
</body>
</html> 

<script>
    const stars = document.querySelectorAll('.star-row i');
    const emojiContainer = document.getElementById('face');
    let currentEmoji = null;
    let canBeChanged = true;
    let rating=0;
    stars.forEach((star, index) => {
        star.addEventListener('mouseenter', () => {
            if (canBeChanged && !star.classList.contains('selected')) {
            for (let i = 0; i <= index; i++) {
                stars[i].style.color = 'gold';
            }

            if (currentEmoji !== null) {
                emojiContainer.removeChild(currentEmoji);
            }

            const emoji = document.createElement('i');
            if (index === 4) {
                emoji.classList.add('fa-solid', getEmojiClass(index), 'fa-2xl', 'fa-bounce');
            } else {
                emoji.classList.add('fa-solid', getEmojiClass(index), 'fa-2xl');
            }
            emoji.style.color = '#ffb900';
            emojiContainer.appendChild(emoji);
            currentEmoji = emoji;
            }
        });

        star.addEventListener('mouseleave', () => {
            if (canBeChanged && !star.classList.contains('selected') && currentEmoji !== null) {
                for (let i = 0; i <= index; i++) {
                    stars[i].style.color = '#3e3e3e';
                }
            }
        });

        star.addEventListener('click', () => {
            if (canBeChanged) {
                star.classList.toggle('selected');
                canBeChanged = false;
                rating = star.classList.contains('selected') ? index + 1 : 0;
                // Update the hidden input field value
                document.getElementById('rating-input').value = rating;
                console.log(document.getElementById('rating-input').value);
                console.log('Rating:', rating);
            }
        });
    });

    function getEmojiClass(index) {
        switch (index) {
            case 0:
            return 'fa-face-sad-tear';
            case 1:
            return 'fa-face-frown';
            case 2:
            return 'fa-face-meh';
            case 3:
            return 'fa-face-smile';
            case 4:
            return 'fa-face-laugh-squint';
            default:
            return '';
        }
    }

</script>

