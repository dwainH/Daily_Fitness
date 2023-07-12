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
    <script>
    function showToast(message) {
        var toast = document.createElement("div");
        toast.classList.add("toast");
        toast.textContent = message;

        document.body.appendChild(toast);

        setTimeout(function () {
            document.body.removeChild(toast);
        }, 3000);
    }
</script>
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
    <br><br>
    <div class="info" style="padding-left: 20px; padding-top:5px">
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
                    <select id="food" name="food" class="diary-dropdown">
                        <option value="" disabled selected>Select Food</option>
                        <?php
                        // Fetch food options from the database
                        // Adjust the database connection code and query according to your setup
                        $foodOptionsQuery = "SELECT CONCAT(`FoodID`, ' - ', `Name`, ' - ', `Calories`) AS food_with_calories FROM `food`";
                        $foodOptionsResult = mysqli_query($connection, $foodOptionsQuery);
                        while ($row = mysqli_fetch_assoc($foodOptionsResult)) {
                            $foodName = $row['food_with_calories'];
                            echo "<option value='$foodName'>$foodName</option>";
                        }
                        ?>
                    </select>
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
                    <select id="exercise" name="exercise" class="diary-dropdown">
                        <option value="" disabled selected>Select Exercise</option>
                        <?php
                        // Fetch exercise options from the database
                        // Adjust the database connection code and query according to your setup
                        $exerciseOptionsQuery = "SELECT CONCAT(`ExerciseID`, ' - ', `Name`, ' - ', `CaloriesBurnPerMin`) AS exercise_with_calBurn FROM `exercise`";
                        $exerciseOptionsResult = mysqli_query($connection, $exerciseOptionsQuery);
                        while ($row = mysqli_fetch_assoc($exerciseOptionsResult)) {
                            $exerciseName = $row['exercise_with_calBurn'];
                            echo "<option value='$exerciseName'>$exerciseName</option>";
                        }
                        ?>
                    </select>
                    <label for="exercise-minutes">Minutes:</label>
                    <select id="exercise-minutes" name="exercise-minutes" class="diary-dropdown">
                        <option value="" disabled selected>Select Minutes</option>
                        <?php
                        // Generate options for minutes from 1 to 60
                        for ($i = 1; $i <= 60; $i++) {
                            echo "<option value='$i'>$i</option>";
                        }
                        ?>
                    </select>
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
            <form action="process_diary.php" method="POST">
                <div class="form-mental">
                    <input type="text" id="mentalName" name="mentalName" required placeholder="Name of mental illness">
                </div>
                <div class="form-mental">
                    <input type="text" id="symptomsMental" name="symptomsMental" required placeholder="Your symptoms">
                </div>
            </form>
        </div>
    </div>
    <div style="display: flex; justify-content: center; align-items: center;">
        <style>
        .custom-button {
            background-color: #3ab353;
            font-family: "Nunito", sans-serif;
            color: white;
            border-radius: 10px;
            padding: 10px 20px;
            transition: background-color 0.3s;
            font-weight:bolder;
            border-color: transparent;
        }

        .custom-button:hover {
            background-color: #63b77d;
        }
        </style>

        <button onclick="submitEntries()" class="custom-button">Submit</button>
    </div>
    <script>
        function submitEntries() {
            //var dateElement = document.getElementById("date"); // Get the date element
            var food = document.getElementById("food").value;
            var exercise = document.getElementById("exercise").value;
            var exerciseMinutes = document.getElementById("exercise-minutes").value;
            var mentalName = document.getElementById("mentalName").value;
            var symptomsMental = document.getElementById("symptomsMental").value;

             // Validate that both food and exercise are selected
            if (food === "" || exercise === "") {
                alert("Please select both food and exercise.");
                return; // Stop the function execution if validation fails
            }

            // Validate that exercise minutes are selected
            if (exerciseMinutes === "") {
                alert("Please select the exercise duration.");
                return; // Stop the function execution if validation fails
            }

            // Calculate calories burned from exercise
            var exerciseCaloriesBurnPerMin = parseFloat(exercise.split(" - ")[2]);
            var caloriesBurnExercise = exerciseMinutes * exerciseCaloriesBurnPerMin;

            // Perform further validations if needed before submitting the entries

            // Submit the entries using AJAX or your preferred method
            // Here, I'm assuming you are using the form's action attribute to send the data to process_diary.php
            // Modify the form's action attribute if needed
            document.querySelector("form").action = "process_diary.php";

            // Create hidden input fields to store the calculated values and append them to the form
            var totalCalories = parseFloat(food.split(" - ")[2]) - caloriesBurnExercise;
            // Extract the date value from the element
            //var date = dateElement.textContent.trim(); // Trim any leading/trailing whitespace
            //var userID = ""; // Get the user ID value
            var foodID = food.split(" - ")[0];
            var exerciseID = exercise.split(" - ")[0];

            var hiddenTotalCalories = document.createElement("input");
            hiddenTotalCalories.type = "hidden";
            hiddenTotalCalories.name = "totalCalories";
            hiddenTotalCalories.value = totalCalories;

            /*var hiddenDate = document.createElement("input");
            hiddenDate.type = "hidden";
            hiddenDate.name = "date";
            hiddenDate.value = date;

            var hiddenUserID = document.createElement("input");
            hiddenUserID.type = "hidden";
            hiddenUserID.name = "userID";
            hiddenUserID.value = userID;*/

            var hiddenFoodID = document.createElement("input");
            hiddenFoodID.type = "hidden";
            hiddenFoodID.name = "foodID";
            hiddenFoodID.value = foodID;

            var hiddenExerciseID = document.createElement("input");
            hiddenExerciseID.type = "hidden";
            hiddenExerciseID.name = "exerciseID";
            hiddenExerciseID.value = exerciseID;

            var hiddenExerciseMinutes = document.createElement("input");
            hiddenExerciseMinutes.type = "hidden";
            hiddenExerciseMinutes.name = "exerciseMinutes";
            hiddenExerciseMinutes.value = exerciseMinutes;

            var hiddenMentalName = document.createElement("input");
            hiddenMentalName.type = "hidden";
            hiddenMentalName.name = "mentalName";
            hiddenMentalName.value = mentalName;

            var hiddenSymptomsMental = document.createElement("input");
            hiddenSymptomsMental.type = "hidden";
            hiddenSymptomsMental.name = "symptomsMental";
            hiddenSymptomsMental.value = symptomsMental;

            document.querySelector("form").appendChild(hiddenTotalCalories);
            //document.querySelector("form").appendChild(hiddenDate);
            //document.querySelector("form").appendChild(hiddenUserID);
            document.querySelector("form").appendChild(hiddenFoodID);
            document.querySelector("form").appendChild(hiddenExerciseID);
            document.querySelector("form").appendChild(hiddenExerciseMinutes);
            document.querySelector("form").appendChild(hiddenMentalName);
            document.querySelector("form").appendChild(hiddenSymptomsMental);

            // Submit the form
            document.querySelector("form").submit();

            // Reset the form after submission if needed
            document.getElementById("food").value = "";
            document.getElementById("exercise").value = "";
            document.getElementById("exercise-minutes").value = "";
            document.getElementById("mentalName").value = "";
            document.getElementById("symptomsMental").value = "";
        }
    </script>
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
