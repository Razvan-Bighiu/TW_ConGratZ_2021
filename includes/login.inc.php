<?php
    require 'conectare.inc.php';
    session_start();

    $username = $_POST['username'];  
    $password = $_POST['password'];  

    //to avoid sql-injections
    $username = stripcslashes($username);  
    $password = stripcslashes($password);  
    $username = mysqli_real_escape_string($conectare, $username);  
    $password = mysqli_real_escape_string($conectare, $password);  
    
    $sql = "SELECT * FROM users WHERE username ='$username' AND password = '$password'";
    $result = mysqli_query($conectare, $sql);  
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    $count = mysqli_num_rows($result);  
        
    if($count == 1){
        $_SESSION['username'] = $username;
        header ("location: ../index.php"); 
    }  
    else{  
        header ("location: ../login.php?info=gresit"); 
    }     