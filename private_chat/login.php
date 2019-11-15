<?php 
session_start();
require_once("connection.php") ?>

<!DOCTYPE html>
<html>
    <head> 
        <style> </style>

    </head> 
    <body>
    <h1 > login </h1>
    <div id="container">
        <form method="post">
            <input type="text" placeholder="usernmaenr" name="user_name">
            <input type="password" placeholder="password" name="password">
            <input type="submit" name="login" value="login">
            <a href="register.php"> register here </a>
        </form> 
    </div>

    <?php 
        if(isset($_POST['login']))
        {
            $user_name= $_POST['user_name'];
            $password = $_POST['password'];
            
            $q='SELECT *  FROM `users` WHERE `user_name`="'.$user_name.'" AND `password`="'.$password.'" ';

            $r=mysqli_query($con,$q);

                if($r)
                {
                    if(mysqli_num_rows($r)>0){
                    
                    $_SESSION['username']=$user_name;
                    header("location:index.php");
                    }else{
                        echo "login faikl";
                    }
                }else{
                    echo $q;
                }
        }
    ?>
    </body>  
</html>
