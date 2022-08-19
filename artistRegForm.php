<?php
/**
 * Created by PhpStorm.
 * User: Dhananjaya Madhusankha
 * Date: 18/10/2020
 * Time: 11:43 PM
 */

require_once ('connection.php');
error_reporting(E_ERROR | E_PARSE);

if(isset($_POST['reg_user'])){


    $first_name = mysqli_real_escape_string($connection, $_POST['fname']);
    $last_name =  mysqli_real_escape_string($connection, $_POST['lname']);
    $nic = mysqli_real_escape_string($connection,$_POST['nicNo']);
    $gender = mysqli_real_escape_string($connection, $_POST['gender']);
    $line1 = mysqli_real_escape_string($connection, $_POST['line1']);
    $line2 = mysqli_real_escape_string($connection, $_POST['line2']);
    $line3 = mysqli_real_escape_string($connection, $_POST['line3']);
    $phone = mysqli_real_escape_string($connection, $_POST['phone']);
    $email = mysqli_real_escape_string($connection,$_POST['email']);
    $psw = mysqli_real_escape_string($connection, $_POST['psw']);
    $psw_con = mysqli_real_escape_string($connection, $_POST['psw-con']);
    //$address = mysqli_real_escape_string($connection,$_POST['address']);
    // $image = addslashes($_FILES['image']['tmp_name']);
    // $name = $_FILES['image']['name'];
    // $image = file_get_contents($image);
    // $image = base64_encode($image);



    $name = $first_name.' '. $last_name;
    $address = $line1.', '. $line2.', '.$line3;

    $hashed_pw = md5($psw);

    // --------------------------------------------

    $fname = $_FILES['image']['name'];
    $size = $_FILES['image']['size'];
    $type = $_FILES['image']['type'];
    $tmp_name = $_FILES['image']['tmp_name']; 
	// echo $tmp_name;
	
	

    if (empty($fname)){
        $location = null;
    }else{
        $location = "img/artist/";
        $new_f_name = $nic.'_'.$fname;
        rename($fname, $new_f_name) ;
    }

 //    echo $tmp_name;


    if(move_uploaded_file($tmp_name, $location.$new_f_name)){
        $smsg = "Uploaded Successfully";
        // echo "success";

    }else{
        $fmsg = "Failed to Upload File";
        // echo "file error";
         echo '<script type="text/javascript"> alert("Failed to Upload File")</script>';
    }

    $image = $location.$new_f_name;

    // ------------------------------------------
// echo "<br>";
// echo "file...".$file."hh";


    $email_query = "SELECT * FROM users WHERE EMAIL = '{$email}'";
    $email_result = mysqli_query($connection,$email_query);

    if ($email_result) {
        if (mysqli_num_rows($email_result) >= 1) {
            $email_error = "This email is already exist reset password or enter another email";
            $err = "error";
            echo '<script type="text/javascript"> alert("Email already exist '.$mysqli -> error.'")</script>';
            // echo "email error";
        }
    }

    if ($psw != $psw_con){
        $pass_error = 'Password not matched';
        $err = "error";
    }

    if (empty($email_error) && empty($pass_error)) {
    //    $send_to_db = "INSERT INTO `users` ( `NAME`, `NIC`, `GENDER`, `MOBILE`, `EMAIL`, `PASSWORD`, `USER_TYPE`) VALUES ('{$name}', '{$nic}', '{$gender}', '{$phone}', '{$email}', '{$psw}', 'voter')";
       $send_to_db = "INSERT INTO `users` (`NAME`, `NIC`, `GENDER`, `MOBILE`, `EMAIL`, `PASSWORD`, `ADDRESS`, `IMG`, `USER_TYPE`) VALUES ('{$name}', '{$nic}', '{$gender}', '{$phone}', '{$email}', '{$hashed_pw}', '{$address}', '{$image}', 'artist')";
       $result = mysqli_query($connection, $send_to_db);
       

        if ($result){

            echo '<script type="text/javascript"> alert("Successfully Registed'.mysqli_error(connection).'")</script>';

        }
        else{
             echo '<script type="text/javascript"> alert("error '.mysqli_error($connection).'")</script>';

        }
    }

    // echo $send_to_db;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Artist Register</title>

    <link rel="stylesheet" type="text/css" href="CSS/Login/artistLoginStyle.css">
    <link rel="stylesheet" type="text/css" href="CSS/Register/voterRegFormStyle.css">
    <link rel="stylesheet" type="text/css" href="CSS/cancelBtnStyle.css">

    <link rel="stylesheet" type="text/css" href="CSS/homeStyle.css">
    <link rel="stylesheet" type="text/css" href="CSS/serviceStyle.css">
    <link rel="stylesheet" type="text/css" href="CSS/FooterStyle.css">
    <link rel="stylesheet" type="text/css" href="CSS/SlideStyle.css">
    <script src="js/myScript.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


    <script src="js/voterRegScript.js"></script>

</head>
<body>
<?php require_once('navBarOut.php');?>
<form name="myForm" action="<?php echo $_SERVER["PHP_SELF"]; ?>" onsubmit="return validateForm()" method="post" enctype="multipart/form-data">
    <div class="container" style="margin-top: 10%">
        <h1>Register Form</h1>
        <p class="ctgName">Artist</p>
        <hr>

        <label for="fname"><b>First Name</b></label>
        <input type="text" placeholder="First Name" name="fname" id="fname" >


        <label for="lname"><b>Last Name</b></label>
        <input type="text" placeholder="Last Name" name="lname" id="lname" >


        <label for="nicNo"><b>NIC Number</b></label>
        <input type="text" placeholder="NIC Number" name="nicNo" id="nicNo" >

        <table>
            <tr>
                <td>
                    <label style="margin-top: 1%; margin-right: 50px" class="select">Male
                        <input type="radio" name="gender" value="Male">
                        <span class="checkmark"></span>
                    </label>
                </td>
                <td>
                    <label class="select" style="margin-right: 50px">Female
                        <input type="radio" name="gender" value="Femail">
                        <span class="checkmark"></span>
                    </label>
                </td>
                <td>
                    <label class="select">Other
                        <input type="radio" name="gender" value="Other">
                        <span class="checkmark"></span>
                    </label>
                </td>
            </tr>
        </table>

        <br>

        <label for="line1"><b>Address</b></label>
        <input class="Add" type="text" placeholder="Address Line 1" name="line1" id="line1" >

        <label style="margin-top: 1%" for="line2"><b></b></label>
        <input class="Add" type="text" placeholder="Address Line 2" name="line2" id="line2" >

        <label for="line3"><b></b></label>
        <input class="Add" type="text" placeholder="Address Line 3" name="line3" id="line3" >


        <label for="phone"><b>Phone Number</b></label>
        <input type="text" placeholder="Phone Number" name="phone" id="phone" >

        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="email" id="email" >

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" id="psw" >

        <label for="psw-con"><b>Confirm Password</b></label>
        <input type="password" placeholder="Confirm Password" name="psw-con" id="psw-con" >

        <label for="psw-con"><b>Upload Image</b></label>
        <input type="file" class=" form-control-file" name="image" value="image">
        <hr>
        <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
        

        <button type="submit" class="registerbtn" name="reg_user">Register</button>

        <hr>

        <button type="button" class="canbtn" onclick="document.location='index.html">Cancel</button>
    </div>

</form>

</body>
</html>