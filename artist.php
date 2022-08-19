<?php
/**
 * Created by PhpStorm.
 * User: Dhananjaya Madhusankha
 * Date: 18/10/2020
 * Time: 11:43 PM
 */

require_once ('connection.php');

session_start();
if (!isset($_SESSION['user_id']) ){
    echo '<script type="text/javascript"> document.location = "Login.php";</script>';
    //   header('location: login.php');
}

if(isset($_POST['reg_user'])){


    $email = mysqli_real_escape_string($connection,$_POST['email']);
    $psw = mysqli_real_escape_string($connection, $_POST['psw']);
    $psw_con = mysqli_real_escape_string($connection, $_POST['psw-con']);


    $hashed_pw = md5($psw);

    if (isset($_POST['check_admin'])){
        $type = "admin";
    }



    $email_query = "SELECT * FROM users WHERE EMAIL = '{$email}'";
    $email_result = mysqli_query($connection,$email_query);

    if ($email_result) {
        if (mysqli_num_rows($email_result) >= 1) {
            $email_error = "This email is already exist reset password or enter another email";
            $err = "error";
            echo "error";
        }
    }

    if ($psw != $psw_con){
        $pass_error = 'Password not matched';
        $err = "error";
    }

    if (empty($email_error) && empty($pass_error)) {
        //$send_to_db = "INSERT INTO `users` ( `NAME`, `NIC`, `GENDER`, `MOBILE`, `EMAIL`, `PASSWORD`, `USER_TYPE`) VALUES ('{$name}', '{$nic}', '{$gender}', '{$phone}', '{$email}', '{$psw}', 'voter')";
        $send_to_db = "INSERT INTO `users` (`NAME`, `NIC`, `GENDER`, `MOBILE`, `EMAIL`, `PASSWORD`, `ADDRESS`, `IMG`, `USER_TYPE`) VALUES ('{$name}', '{$nic}', '{$gender}', '{$phone}', '{$email}', '{$psw}', '{$address}', '', 'voter')";
        $result = mysqli_query($connection, $send_to_db);

        if ($result){

            $success = "success";

        }
        else{
            echo "error".mysqli_error($connection);
            echo "<script type='text/javascript'>alert('".mysqli_error($connection)."')</script>";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Voter Login</title>
<!--    <link rel="stylesheet" type="text/css" href="CSS/artistRegisterStyle.css">-->
    <link rel="stylesheet" type="text/css" href="CSS/Login/voterLoginStyle.css">
    <link rel="stylesheet" type="text/css" href="CSS/cancelBtnStyle.css">
</head>
<body>
<form action="/action_page.php">
    <div class="container">
        <h1>Log in</h1>
        <br>
        <p class="ctgName">Voter</p>
        <hr>

        <label for="username"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="username" id="username" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" id="psw" required>

        <button type="submit" class="loginbtn" name="log_user">Log in</button>

        <div class="container login">
            <p><a href="forgetPsw.html">Forgot your password? </a></p>
        </div>

        <hr>

    <div class="container login">
        <p>Don't have a free account yet?</p>
        <button type="button" class="regbtn">Create your account</button>
    </div>


            <hr>
            <button class="canbtn" onclick="document.location='Home.html'">Cancel</button>
    </div>
</form>

</body>
</html>