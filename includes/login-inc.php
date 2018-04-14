<?php

session_start();

if (isset($_POST['submit'])) {

    include_once 'dbh-inc.php';

    //get data
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);

    //check for empty inputs
    if(empty($email) || empty($password)){
        header("Location: ../index.php?login=empty");
        exit();
    }

    //get info from db
    $sql = "SELECT * FROM user WHERE email='$email'";
    $result = mysqli_query($connection, $sql);
    $resultCheck = mysqli_num_rows($result);

    //if no results then exit
    if($resultCheck < 1){
        header("Location: ../index.php?login=error");
        exit();
    }

    //compare passwords
    if($row = mysqli_fetch_assoc($result)){
        $hashedPwdCheck = password_verify($password, $row['password']);
        if(!$hashedPwdCheck){
            //passwords didn't match
            header("Location: ../index.php?login=error");
            exit();
        } else {
            //log user in
            //store user info into the session
            $_SESSION['email'] = $row['email'];
            $_SESSION['fname'] = $row['fname'];
            $_SESSION['mname'] = $row['mname'];
            $_SESSION['lname'] = $row['lname'];
            $_SESSION['type'] = $row['type'];
            header("Location: ../index.php?login=success");
            exit();
        }
    }

} else {
    header("Location: ../index.php?login=error");
    exit();
}