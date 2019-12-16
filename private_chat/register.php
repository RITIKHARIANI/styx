<?php require_once("connection.php"); ?>
<!DOCTYPE html>
<html>
    <style>
        
    </style>
    <body>
        <h1 align="center"> register </h1>
        <div id="container">
            <form method="post">
                <input type="text" name="user_name" placeholder="usernmae" required><br>
                <input type="password" name="password" placeholder="enter pass" required><br>
                <input type="submit" value="register" id="register" name="register">
                <a href="login.php">login here </a>
                
            </form>

        </div>

        <?php 
            if(isset($_POST['register']))
            {
                $user_name= $_POST['user_name'];
                $password = $_POST['password'];

                // $q="INSERT INTO `users` (`id`,`user_name`,`password`) VALUES('','".$user_name."','".$password."')";
                $q = " insert into users values('$user_name','$password') ";

                $r=mysqli_query($con,$q);

                if($r)
                {
                    header("location:login.php");
                }else{
                    echo $q;
                }
            }
        ?>
    </body>

</html>