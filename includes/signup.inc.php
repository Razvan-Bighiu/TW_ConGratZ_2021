<?php
    require 'conectare.inc.php';

    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // $password_hashed = password_hash('password', PASSWORD_DEFAULT); 
    //criptare parola

    $sql = "SELECT username FROM users WHERE username = '$username'";
    $result = mysqli_query($conectare, $sql);
    $check = mysqli_num_rows($result);

    if ($check > 0) {
        header("Location: ../SignUp.php?info=utilizatorul_exista");
    } else {
        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password_hashed')";
        $result = mysqli_query($conectare, $sql);
        header ("Location: ../SignUp.php?info=inregistrare_efectuata");
    }
?>