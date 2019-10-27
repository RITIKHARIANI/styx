<?php 
    //defining the variables
    $usernameErr = $passwordErr = "";
    $username = $password ="";

    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        if(empty($_POST["name"]))
            $usernameErr="Name is required";
        else
            $username = test_input($_POST["name"]);
            if (!preg_match("/^[a-zA-Z ]*$/",$name)) 
            {
                $usernameErr = "Only letters and white space allowed";
            }
        
        if(empty($_POST["password"]))
            $password="Password Required";
        else
            $password = test_input($_POST["password"]);
        
    }

    function test__input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }


?>