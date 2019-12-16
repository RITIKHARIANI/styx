<?php 
    //defining the variables
    $usernameErr = $passwordErr = "";
    $username = $password ="";

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        if(empty($_POST["name"]))
            $usernameErr="Name is required";
        else
            $username = test_input($_POST["name"]);
            if (!preg_match("/^[a-zA-Z ]*$/",$username)) 
            {
                $usernameErr = "Only letters and white space allowed";
            }
        
        if(empty($_POST["password"]))
            $password="Password Required";
        else
            $password = test_input($_POST["password"]);
        
    }
    
        session_start();
        require_once("../private_chat/connection.php");

      if(isset($_POST['login']))
      {
      $user = $_POST['username'];
      $pass = $_POST['password'];
    
      $q = " select * from Accounts where Username = '$user' AND Password = '$pass' ";
      $result = mysqli_query($con,$q);
      $num = mysqli_num_rows($result);
      if($num == 0)
      {
        $message = "Invalid Username or Password";
        echo "<script type='text/javascript'>
                alert('$message');
                window.location.href='index.php';
                </script>";
      }
      if($num >0)
      {
        $_SESSION['username']=$user; 
        $cookie_name = "username";
        $cookie_value = $user;
        $path = "/";
        $domain = $_SERVER['SERVER_NAME'];
        setcookie($cookie_name, $cookie_value, time()+(60*60*2),$path,$domain);
          header("location:../index.html");
      }
      }
?>

