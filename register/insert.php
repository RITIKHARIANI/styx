<?php


    session_start();
    $con = mysqli_connect("localhost","root");

    if($con){
        echo "Connection Successful";
    }else{
        echo "Unable to connect";
    }
    
    mysqli_select_db($con,'project');

    $user = $_POST['username'];
    $mail = $_POST['mail'];
    $pass = $_POST['password'];
    $phone = $_POST['phone'];
    $recmail = $_POST['recmail'];

    $q = " select * from test where email = '$mail' ";
    $result = mysqli_query($con,$q);
    $num = mysqli_num_rows($result);
    if($num == 1)
    {
        $message = "User Already Exists";
        echo "<script type='text/javascript'>alert('$message');</script>";
        sleep(3);
        header("location:index.html");

    }
    if($num == 0)
    {
        $qin = " insert into test values('$user','$mail','$pass','$phone','$recmail') ";
        $result_new = mysqli_query($con,$qin);
        if($result_new)
        {
            $message = "Registration Successful<br>Redirecting to login Page";
            echo "<script type='text/javascript'>alert('$message');</script>";
            sleep(3);
            header("location:../login/index.html");
        }else{
            $message = "Registration UnSuccessful<br>Servers Might be down";
            echo "<script type='text/javascript'>alert('$message');window.loca</script>";
            sleep(3);
            header("location:index.html");
        }
        
        
    }


?>