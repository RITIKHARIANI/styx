<?php
    session_start();

    $con = mysqli_connect("localhost","id11595626_root","password");


    mysqli_select_db($con,'id11595626_styx');

    $user = $_POST['username'];
    $mail = $_POST['mail'];
    $pass = $_POST['password'];
    $phone = $_POST['phone'];
    $recmail = $_POST['recmail'];
    $q = " select * from Accounts where Username = '$user' ";
    $result = mysqli_query($con,$q);
    $num = mysqli_num_rows($result);
    if($num == 1)
    {
        $message = "User Already Exists";
        // echo "<script type='text/javascript'>
        //         alert('$message');
        //         window.location.href = './index.php';
        //         </script>";
        //sleep(3);
        header("location:index.html");

    }
    if($num == 0)
    {
        $qin = " insert into Accounts values('$user','$mail','$pass','$phone','$recmail') ";
        $result_new = mysqli_query($con,$qin);
        if($result_new)
        {
            $message = "Registration Successful<br>Redirecting to login Page";
            mkdir('../share/storage/'.$user);

            // echo "<script type='text/javascript'>
            //         alert('$message');
            //         window.location.href = ../login/index.php;
            //         </script>";
            //sleep(3);
            header("location:../login/index.php");

        }else{
            $message = "Registration UnSuccessful<br>Servers Might be down";
            // echo "<script type='text/javascript'>alert('$message');window.location.href=./index.php</script>";
            // sleep(3);
            header("location:index.php");
        }
        
        
    }


?>
