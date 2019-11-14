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
    

    $con = mysqli_connect("sql12.freesqldatabase.com","sql12311787","s6SXUShK2r");


    
    if($con)
    {
        echo "connection successful";
    }else{
        echo "no connection";
    }


      mysqli_select_db($con,'sql12311787');

      $user = $_POST['username'];
      $pass = $_POST['password'];
    
      $q = " select * from Accounts where Username = '$user' && Password = '$pass' ";
      $result = mysqli_query($con,$q);
      $num = mysqli_num_rows($result);
      if($num == 0)
      {
        echo("Invalid User");
        $message = "Invalid Username or Password";
        
           
        //sleep(3);
        header("location:index.html");
      }
      if($num == 1)
      {
          echo "Login Successful";
          header("location:../index.html");
      }
?>

