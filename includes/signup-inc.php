<?php

session_start();

if (isset($_POST['submit']) && !isset($_SESSION['email'])){

    include_once 'dbh-inc.php';

    //get data
    $first = mysqli_real_escape_string($connection, $_POST['first']);
    $middle = mysqli_real_escape_string($connection, $_POST['middle']);
    $last = mysqli_real_escape_string($connection, $_POST['last']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $password2 = mysqli_real_escape_string($connection, $_POST['password2']);
    $age = mysqli_real_escape_string($connection, $_POST['age']);
    $gender = mysqli_real_escape_string($connection, $_POST['gender']);


    //check for empty fields
    if(empty($first) || empty($last) || empty($email) || empty($password) || empty($password2) || empty($age) || empty($gender)){
        header("Location: ../signup.php?signup=empty");
        exit();
    }

    //check if inputs are valid
    if(!(preg_match("/^[a-zA-Z]*$/", $first) &&
        preg_match("/^[a-zA-Z]*$/", $middle) &&
        preg_match("/^[a-zA-Z]*$/", $last) &&
        preg_match("/^[1-9][0-9]{0,2}$/", $age))){

        header("Location: ../signup.php?signup=invalid");
        exit();
    }

    //validate gender
    if(!(strcmp($gender, "M") == 0 || strcmp($gender, "F") == 0)){
        header("Location: ../signup.php?signup=invalidgender");
        exit();
    }

    //validate email
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location: ../signup.php?signup=email");
        exit();
    }

    //check if user is already in db
    $queryEmail = "SELECT * FROM user WHERE email='$email'";
    $resultEmail = mysqli_query($connection, $queryEmail);
    $resultEmailCheck = mysqli_num_rows($resultEmail);

    if($resultEmailCheck > 0){
        header("Location: ../signup.php?signup=emailtaken");
        exit();
    }

    //check if passwords match
    if(strcmp($password, $password2) != 0){
        header("Location: ../signup.php?signup=pwdnonmatch");
        exit();
    }

    //hash password
    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

    //store user into db with default role 'Customer'
    $sql = "INSERT INTO user (fname, mname, lname, email, password, age, gender, type) 
                      VALUES ('$first', '$middle', '$last', '$email', '$hashedPwd', '$age', '$gender', 'Customer');";

    mysqli_query($connection, $sql);

    header("Location: ../index.php");
    exit();

} else {
    header("Location: ../index.php");
    exit();
}