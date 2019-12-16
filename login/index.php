

<!DOCTYPE html>
<html>

<head>
    <title>Styx-Login</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <!--<script type="text/javascript" src="logins.js"></script> -->
</head>

<body>
    <div class="login-box" id="lgbx1">
        <h1>Login</h1>
        <!--form login over here-->
        <form method="post" action="form_validate_login.php">
            <div class="texts">
                <input type="text" name="username" placeholder="Enter Username" id="uname" required>
            </div>
            <div class="texts">
                <input type="password" name="password" placeholder="Enter password" id="passwd" required>
            </div>
            <input type="checkbox" name="remember" value="remember" id="ckset"> <span class="checks">Remember me </span><br>
            <input class="btn" type="submit" name="login" value="Login">
            <br><br>
            <a href="../register/index.php" class="btn" style="text-decoration: none;">Don't have an account? <b>Sign
                    Up</b><a>

        </form>
    </div>
    

</body>

</html>
