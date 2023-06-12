<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="login-container">
    <img alt="usericon" id="user" src="images/user-circle-solid.svg">
        <h2>Login</h2>
        <form action="login_action.php" method="POST" onSubmit="return validate();">
        <?php
            if (isset($_SESSION["errorMessage"])) {
        ?>
        <div class="error-message">
        <?php  echo $_SESSION["errorMessage"]; ?>
        </div>
        <?php
                unset($_SESSION["errorMessage"]);
            }
        ?>
            <div class="form-group">
                <label for="username">Username:</label>
                <span id="user_info"class="error-info"></span>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <span id="password_info" class="error-info"></span>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Login</button>
            <button>Register</button>
        </form>
    </div>
    <script>
    function validate() {
        var $valid = true;
        document.getElementById("user_info").innerHTML = "";
        document.getElementById("password_info").innerHTML = "";
        
        var userName = document.getElementById("user_name").value;
        var password = document.getElementById("password").value;
        if(userName == "") 
        {
            document.getElementById("user_info").innerHTML = "required";
        	$valid = false;
        }
        if(password == "") 
        {
        	document.getElementById("password_info").innerHTML = "required";
            $valid = false;
        }
        return $valid;
    }
    </script>
</body>
</html>