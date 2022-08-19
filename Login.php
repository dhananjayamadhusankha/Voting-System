<?php
/**
 * Created by PhpStorm.
 * User: Dhananjaya Madhusankha
 * Date: 20/10/2020
 * Time: 02:43 AM
 */

require_once ('connection.php');
    session_start();



if(isset($_POST['log_user'])){




    $errors = array();

    $username = mysqli_real_escape_string($connection,$_POST['username']);
    $pass = mysqli_real_escape_string($connection,$_POST['psw']);
    $hashed_pw = md5($pass);

    $query = "SELECT * FROM users   WHERE email = '{$username}' AND password ='{$hashed_pw}'";
    $result_set = mysqli_query($connection, $query);

    if ($result_set) {
        if (mysqli_num_rows($result_set) == 1) {


            while ($row = mysqli_fetch_array($result_set)){
                $_SESSION['id'] = $row['ID'];
                $_SESSION['name'] = $row['NAME'];

                if ($row['USER_TYPE'] == "admin"){
                    $_SESSION['user_type'] = "admin";
                    header('location: admin.php');
                }
                else{
                    $_SESSION['user_type'] = "voter";
                    header('location: index.php');

                }

            }

        }
        else {
            $errors[] = " Invalid Email or Password";
        }
    } else {
        $errors[] = "Query is not successful";
    }

}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Login</title>

    <link rel="stylesheet" type="text/css" href="CSS/Login/voterLoginStyle.css">
    <link rel="stylesheet" type="text/css" href="CSS/cancelBtnStyle.css">

    <link rel="stylesheet" type="text/css" href="CSS/homeStyle.css">
    <link rel="stylesheet" type="text/css" href="CSS/serviceStyle.css">
    <link rel="stylesheet" type="text/css" href="CSS/FooterStyle.css">
    <link rel="stylesheet" type="text/css" href="CSS/SlideStyle.css">
    <script src="js/myScript.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


</head>
<body>
<?php require_once('nav.php');?>
<form action="<?php echo $_SERVER["PHP_SELF"];?>"  method="post">
    <div class="container" style="margin-top: 10%">
        <h1>Log in</h1>
        <br>

        <label for="username"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="username" id="username" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" id="psw" required>
        <?php

        if ((isset($errors) && !empty($errors))){
            echo '<h6 style="color: red; text-align: center;">Email or Password is incerrect</h6>';
        }

        ?>

        <button type="submit" class="loginbtn" name="log_user">Log in</button>
</form>
        <div class="container login">
            <p><a href="forgetPsw.html">Forgot your password? </a></p>
        </div>

        <hr>

            <p>Don't have a free account yet?</p>
            <button type="button" class="regbtn" onclick="document.location='signupCtg.php'">Create your account</button>


        <hr>
        <button class="canbtn" onclick="document.location='index.php'">Cancel</button>

    </div>


</body>
</html>