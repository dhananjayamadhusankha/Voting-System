<?php
/**
 * Created by PhpStorm.
 * User: Dhananjaya Madhusankha
 * Date: 20/10/2020
 * Time: 02:43 AM
 */

require_once ('connection.php');

if(isset($_POST['log_user'])){


    session_start();
    $_SESSION['id']='';
    $_SESSION['name']='';
    $_SESSION['user_type']='user';


    $errors = array();

    $username = mysqli_real_escape_string($connection,$_POST['username']);
    $pass = mysqli_real_escape_string($connection,$_POST['psw']);
    $hashed_pw = md5($pass);

    $_SESSION['user_type'];

    $query = "SELECT * FROM users   WHERE email = '{$username}' AND password ='{$hashed_pw}'";
    echo $query;
    $result_set = mysqli_query($connection, $query);

    $admin_query = "SELECT ";

    if ($result_set) {
        if (mysqli_num_rows($result_set) == 1) {


            while ($row = mysqli_fetch_array($result_set)){
                $_SESSION['id'] = $row['ID'];
                $_SESSION['name'] = $row['NAME'];

                if ($row['user_type'] == "admin"){
                    $_SESSION['user_type'] = "admin";
                    header('location: admin.php');
                }
                else{
                    $_SESSION['user_type'] = "voter";
                    header('location: index.html');

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
    
    <title>Voter Login</title>

    <link rel="stylesheet" type="text/css" href="CSS/Login/voterLoginStyle.css">
    <link rel="stylesheet" type="text/css" href="CSS/cancelBtnStyle.css">
    <link rel="stylesheet" type="text/css" href="CSS/homeStyle.css">

</head>
<body>
    <?php require_once('navBarIn.php');?>
<form action="<?php echo $_SERVER["PHP_SELF"];?>"  method="post">
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
</form>
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


</body>
</html>