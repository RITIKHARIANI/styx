
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
        <form method="post" action="./form_validate_login.php">
            <div class="texts">
                <input type="text" name="username" placeholder="Enter Username" id="uname" required>
            </div>
            <div class="texts">
                <input type="password" name="password" placeholder="Enter password" id="passwd" required>
            </div>
            <input type="checkbox" name="rems" value="remeber" id="ckset"> <span class="checks">Remember me </span><br>
            <input class="btn" type="submit" name="subs" value="Login">
            <br><br>
            <a href="../register/index.php" class="btn" style="text-decoration: none;">Don't have an account? <b>Sign
                    Up</b><a>

        </form>
    </div>
    <div class="register" id="rgbx1">
        <h1>Register</h1>
        <div class="texts">
            <input type="text" name="logn" placeholder="username">
        </div>
        <div class="texts">
            <input type="password" name="pasd" placeholder="password">
        </div>
        <div class="texts">
            <input type="password" name="pasd" placeholder="confirm password">
        </div>
        <input class="btn" type="submit" name="subs" value="Sign up!" >
        <input class="btn" type="submit" name="subs" value="Login" >
    </div>
</body>

</html>