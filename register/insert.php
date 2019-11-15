<?php
    session_start();

    $con = mysqli_connect("sql12.freesqldatabase.com","sql12311787","s6SXUShK2r");



    if($con){
        echo "Connection Successful";
    }else{
        echo "Unable to connect";
    }
    
    mysqli_select_db($con,'sql12311787');

    $user = $_POST['username'];
    $mail = $_POST['mail'];
    $pass = $_POST['password'];
    $phone = $_POST['phone'];
    $recmail = $_POST['recmail'];
    echo "<script> confirm('Do you wanna confirm the values given by you?') </script>";
    $q = " select * from Accounts where Username = '$user' ";
    $result = mysqli_query($con,$q);
    $num = mysqli_num_rows($result);
    if($num == 1)
    {
        $message = "User Already Exists";
        echo "<script type='text/javascript'>
                alert('$message');
                window.location.href = 'index.php';
                </script>";
        //sleep(3);
        //header("location:index.html");

    }
    if($num == 0)
    {
        $qin = " insert into Accounts values('$user','$mail','$pass','$phone','$recmail') ";
        $result_new = mysqli_query($con,$qin);
        if($result_new)
        {
            $message = "Registration Successful<br>Redirecting to login Page";

            echo "<script type='text/javascript'>
                    alert('$message');
                    window.location.href = ../login/index.php;
                    </script>";
            //sleep(3);
            //header("location:../login/index.php");

        }else{
            $message = "Registration UnSuccessful<br>Servers Might be down";
            echo "<script type='text/javascript'>alert('$message');window.location.href=index.php</script>";
            sleep(3);
            header("location:index.php");
        }
        
        
    }


?>
