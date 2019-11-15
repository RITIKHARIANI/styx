<?php 
    session_start();
    if(isset($_SESSION['username']))
    {
        
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>
            Private messaging
        </title>
    
    <style>
    <?php require_once("style.php"); ?>
    </style>
    
    </head>

    <body>
        <?php require_once("new-message.php"); ?>
        <div id="container">
            <div id="menu">
            <?php    
                echo $_SESSION['username'];
                echo '<a style="float:right; color: white;" href="logout.php">log out</a> ';
            ?>
            </div>
            <!-- start of left column for friends list-->
            <div id="left-col">
                <?php require_once("left-col.php"); ?>
            <!--end of left col-->   
            </div> 

            <div id="right-col">
                <?php require_once("right-col.php "); ?>
            <!--end of right-col -->   
            </div>
        </div>
    </body>
</html>
