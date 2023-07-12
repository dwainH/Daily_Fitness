
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
                    echo $currentCalorie;
                ?>
            </h4>
            <div class="calorie-bar">
 
                <canvas id="progress-bar">

                </canvas>

            </div>
            <h4 id='calorie-goals'>Calories Needed:
                <?php
                    echo $calorieGoals - $bmr;
                ?>
            </h4>
        </div>
        <div class="vertical-line">
        </div>
        <a type="button" href="#update-weightandheight">Update progress</a>
    </div>
    
    <form action="progress-action.php" method="POST">
    <div id="update-weightandheight" class="weightandheight-container">   
    <h2 id="update-text">Update Your Weight and Height here</h2>
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
<script>
  // Create the chart using Chart.js
  var progressBar = document.getElementById('progress-bar');
    // Create the chart using Chart.js
  // Create the chart using Chart.js
var chart = new Chart(progressBar, {
  type: 'bar',
  data: {
    labels: ['Calories'],
    datasets: [
      {
        label: 'Current Calories',
        data: [<?php echo $currentCalorie; ?>], // Set the initial data for the progress bar
        backgroundColor: 'rgba(75, 192, 192, 0.8)',
        borderColor: 'rgba(75, 192, 192, 1)',
        borderWidth: 1
      },
      {
        label: 'Calorie Goal',
        data: [<?php echo $calorieGoals; ?>], // Set the data for the calorie goal bar
        backgroundColor: 'rgba(255, 99, 132, 0.8)', // Red color for the goal bar
        borderColor: 'rgba(255, 99, 132, 1)',
        borderWidth: 1
      }
    ]
  },
  options: {
    indexAxis: 'y', // Display bars along the y-axis
    elements: {
      bar: {
        borderWidth: 0, // Remove border around the bars
        borderSkipped: false // Display the border for the entire bars
      }
    },
    scales: {
      y: {
        beginAtZero: true,
        max: <?php echo $calorieGoals; ?> // Set the maximum value for the y-axis
      },
      x: {
        display: false // Hide the x-axis labels
      }
    },

    responsive: true,
    maintainAspectRatio: false
  }
});

if (<?php echo $calorieGoals - $bmr; ?> <= 0) {
    var calorieGoalsElement = document.getElementById('calorie-goals');
    calorieGoalsElement.innerHTML = 'Calorie Goal reached for today';
}

</script>

</html>

