<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choose Plan</title>
    <link rel="stylesheet" href="css/style.css">
    <?php include 'plan-action.php'; ?>
</head>

<body>

    <div class="container">
        <h1 id="container-title"><u>Choose Plan</u></h1>
        <hr>
        <div class="goals">
            <div>
                <p>Name: <?php echo $name; ?></p>
                <p>Weight: <?php echo $weight; ?></p>
                <p>Height: <?php echo $height; ?></p>
                <p>Gender: <?php echo $gender; ?></p>
            </div>
            <div class="calorie-goal">
                <h3>Basal Metabolic Rate (BMR):</h3>
                <h3 id="BMR"><?php echo $bmr; ?></h3>
            </div>
            <div>
                <form method="post">>
                    <label for="cars">How Much Weight You Want To Lose Per Week:</label>
                    <select name="WeightPerWeek" id="WeightPerWeek">
                        <option value="1">1Kg</option>
                        <option value="0.5">0.5 Kg</option>
                        <option value="0.25">0.25 Kg</option>
                    </select>
                    <br><br>
                    <label for="cars">Choose Your Activity Level Everyday</label>
                    <select name="ActivityLevel" id="ActivityLevel">
                        <option value="1.725">Very Active</option>
                        <option value="1.55">Moderately Active</option>
                        <option value="1.375">Lightly Active</option>
                        <option value="1.2">Sedentary</option>
                    </select>
                    <br><br>
                    <input type="submit" value="Calculate">
                </form>
                <?php if (isset($caloriesLossPerDay)) { ?>
                    <h3>Daily Calories Intake: <?php echo $caloriesLossPerDay; ?></h3>
                <?php } ?>
            </div>
        </div>
        <button id="buttonToMain" onclick="headtoMain()">Head to main page</button>
    </div>


</body>

<script>
    function headtoMain(){
        window.location.assign('index.php');
    }

</script>

</html>