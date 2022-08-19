<?php
/**
 * Created by PhpStorm.
 * User: Dhananjaya Madhusankha
 * Date: 18/10/2020
 * Time: 11:43 PM
 */

require_once ('connection.php');

if(isset($_POST['reg_user'])){


    $first_name = mysqli_real_escape_string($connection, $_POST['fname']);
    $last_name =  mysqli_real_escape_string($connection, $_POST['lname']);
    $nic = mysqli_real_escape_string($connection,$_POST['nicNo']);
    $gender = mysqli_real_escape_string($connection, $_POST['gender']);
    $phone = mysqli_real_escape_string($connection, $_POST['phone']);
    $email = mysqli_real_escape_string($connection,$_POST['email']);
    $psw = mysqli_real_escape_string($connection, $_POST['psw']);
    $psw_con = mysqli_real_escape_string($connection, $_POST['psw-con']);

    $name = $first_name.' '. $last_name;

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
        $send_to_db = "INSERT INTO `users` (`NAME`, `NIC`, `GENDER`, `MOBILE`, `EMAIL`, `PASSWORD`, `IMG`, `USER_TYPE`) VALUES ('{$name}', '{$nic}', '{$gender}', '{$phone}', '{$email}', '{$hashed_pw}', '', 'voter')";
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
    <title>Voter Register</title>

    <link rel="stylesheet" type="text/css" href="CSS/Login/voterLoginStyle.css">
    <link rel="stylesheet" type="text/css" href="CSS/Register/voterRegFormStyle.css">
    <link rel="stylesheet" type="text/css" href="CSS/cancelBtnStyle.css">
    <link rel="stylesheet" type="text/css" href="CSS/homeStyle.css">

    <script src="js/voterRegScript.js"></script>

</head>
<body>
     <?php require_once('navBarIn.php');?>
<form name="myForm" action="<?php echo $_SERVER["PHP_SELF"]; ?>" onsubmit="return validateForm()" method="post" enctype="multipart/form-data" >
    <div class="container">
        <h1>Register Form</h1>
        <p class="ctgName">Voter</p>
        <hr>
        <label for="fname"><b>First Name</b></label>
        <input type="text" placeholder="First Name" name="fname" id="fname" required>


        <label for="lname"><b>Last Name</b></label>
        <input type="text" placeholder="Last Name" name="lname" id="lname" required>


        <label for="nicNo"><b>NIC Number</b></label>
        <input type="text" placeholder="NIC Number" name="nicNo" id="nicNo" required>

        <h2 style="font-size: 18px">Gender</h2>

        <label style="margin-top: 1%" class="select">Male
            <input type="radio" name="gender" value="Male">
            <span class="checkmark"></span>
        </label>
        <label class="select">Female
            <input type="radio" name="gender" value="Femail">
            <span class="checkmark"></span>
        </label>
        <label class="select">Other
            <input type="radio" name="gender" value="Other">
            <span class="checkmark"></span>
        </label>

        <br>

        <label for="phone"><b>Phone Number</b></label>
        <input type="text" placeholder="Phone Number" name="phone" id="phone" required>

        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="email" id="email" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" id="psw" required>

        <label for="psw-con"><b>Confirm Password</b></label>
        <input type="password" placeholder="Confirm Password" name="psw-con" id="psw-con" required>
        <hr>
        <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

        <button type="submit" class="registerbtn" name="reg_user">Register</button>

        <hr>

        <button type="botton" class="canbtn" onclick="document.location='Home.html'">Cancel</button>



<!--        <a href="index.html" <button type="botton" class="canbtn"">Cancel</button></a>-->
    </div>

</form>

</body>
</html>