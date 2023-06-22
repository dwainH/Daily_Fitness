<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="reg-container">
        <div class="logo">
            <img src="images/logo.png" alt="Logo">
            <div class = "vertical"></div>
        </div>
        <div class = "formreg">
            <h1>Registration Form</h1>
            <form  action="register-action.php" method="POST">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="age">Age:</label>
                    <input type="text" id="age" name="age" required>
                </div>
                <div class="radioRow" style="display:flex; align-content:center">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label for="gender">Gender:</label>&nbsp;&nbsp;&nbsp;
                    <input type="radio" id="male" name="gender" value="MALE">
                    <label for="male">Male</label>&nbsp;&nbsp;&nbsp;<br>
                    <input type="radio" id="female" name="gender" value="FEMALE"><br>
                    <label for="male">Female</label><br>
                </div>
                <div class="form-group">
                    <label for="weight">Weight:</label>
                    <input type="text" id="weight" name="weight" required>
                </div>
                <div class="form-group">
                    <label for="height">Height:</label>
                    <input type="text" id="height" name="height" required>  
                </div>
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div>
                    <button class = "reg" type="submit">Register</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>