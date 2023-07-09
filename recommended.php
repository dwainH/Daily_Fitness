

<html lang="en">
<head>
    <?php include 'index-action.php'; ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <nav class="nav-bar">
            <ul>
                <a href="index.php"><img id="company_logo" src="images/logo.png" alt="logo pic"></a>
                <li class="dropdown active">Recommended Plan<img id="greater-than" src="images/greater-than-solid.svg">
                    <div class="dropdown-menu">
                        <ul>
                            <a href="index.php"><li>Dashboard</li></a>
                            <a href="diary.php"><li>Diary</li></a>
                            <a href="progress.php"><li>Progress</li></a>
                            <a class="active" href="recommended.php"><li>Recommended</li></a>
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
    <div class="recommended-header">
        <h3>RECOMMEND PLAN:</h3>
        <h3>TARGET CALORIES:
        <?php
            echo $calorieGoals
        ?>
        </h3>
    </div>
    
    <div class="plans">
        <div class="column">
            <div id="excercise" class="open-poppup" >
                <img style="width:150px"id="excercise" src="images/dumbbell-solid.svg" alt="excercise"></img>        
                <h3>Excercise</h3>
            </div>
        </div>
        <div class="column">
            <div id="food" class="open-poppup">
                <img style="width: 100px;" src="images/utensils-solid.svg" alt="excercise"></img>        
                <h3>Food</h3>
            </div>
        </div>
        <div class="column">
            <div id="mental" class="open-poppup">
                <img id="brain" style="width:120px;" src="images/brain-solid.svg" alt="excercise"></img>        
                <h3>Mental Health Survey</h3>
            </div>
        </div>
    </div>
    <dialog id="excercise-dialog" class="excercise-dialog">
        <p>hello excercise</p>
        <button id="close-excercise">Close</button>
    </dialog>
    <dialog id="food-dialog" class="food-dialog">
        <p>hello food</p>
        <button id="close-food">Close</button>
    </dialog>
    <dialog id="mental-dialog" class="mental-dialog">
        <p>hello mental</p>
        <button id="close-mental">Close</button>
    </dialog>
    <script src="js/login.js"></script>
    <script>
        document.getElementById('excercise').addEventListener('click',function(event){
            document.getElementById('excercise-dialog').showModal();
        });

        document.getElementById('close-excercise').addEventListener('click',function(event){
            document.getElementById('excercise-dialog').close();
        });

        document.getElementById('food').addEventListener('click',function(event){
            document.getElementById('food-dialog').showModal();
        });

        document.getElementById('close-food').addEventListener('click',function(event){
            document.getElementById('food-dialog').close();
        });

        document.getElementById('mental').addEventListener('click',function(event){
            document.getElementById('mental-dialog').showModal();
        });

        document.getElementById('close-mental').addEventListener('click',function(event){
            document.getElementById('mental-dialog').close();
        });
    </script>
</body>

</html>

