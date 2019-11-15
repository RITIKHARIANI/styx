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
    
    $con = mysqli_connect("localhost","styx","webtech123");
    
    if($con)
    {
        echo "connection successful";
    }else{
        echo "no connection";
    }

    mysqli_select_db($con,'project');

    $user = $_POST['username'];
    $pass = $_POST['password'];
    
    $q = " select * from test where username = '$user' && password = '$pass' ";
    $result = mysqli_query($con,$q);
    $num = mysqli_num_rows($result);

     echo "<script>alert('number',$num,'v')</script>";
    
    if($num == 0)
    {
        echo("Invalid User");
        header("location:index.html");
    }
    else
    {
        echo "Login Successful";
        header("location:../index.html");
        $cookie_name = "username";
        $cookie_value = $user;
        $path = "/";
        $domain = $_SERVER['SERVER_NAME'];
        setcookie($cookie_name, $cookie_value, time()+(60*60*2),$path,$domain);
    }
?>