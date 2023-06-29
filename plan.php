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
            <div class="calorie-goal">
                <h3>Basal Metabolic Rate (BMR):</h3>
                <h3 id="BMR"><?php echo $bmr; ?></h3>
                <br>
                <br>
                <p>Name: <?php echo $name; ?></p>
                <p>Weight: <?php echo $weight; ?></p>
                <p>Height: <?php echo $height; ?></p>
                <p>Gender: <?php echo $gender; ?></p>
            </div>
        </div>
    </div>


</body>

</html>