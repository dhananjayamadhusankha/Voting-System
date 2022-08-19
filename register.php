<?php
/**
 * Created by PhpStorm.
 * User: Thilan Punsara
 * Date: 11/12/2018
 * Time: 11:46 AM
 */


if(isset($_POST['reg_user'])){

    $first_name = mysqli_real_escape_string($connection, $_POST['first_name']);
    $last_name =  mysqli_real_escape_string($connection, $_POST['last_name']);
    $mobile = mysqli_real_escape_string($connection, $_POST['mobile']);
    $email = mysqli_real_escape_string($connection,$_POST['email']);
    $pwd = mysqli_real_escape_string($connection, $_POST['pass']);
    $con_pwd = mysqli_real_escape_string($connection, $_POST['con_pass']);
    $address = mysqli_real_escape_string($connection,$_POST['address']);
    $nic = mysqli_real_escape_string($connection,$_POST['nic']);
    $name = $first_name.' '. $last_name;

    $hashed_pw = md5($pwd);

    if (isset($_POST['check_admin'])){
        $type = "admin";
    }

    $email_query = "SELECT * FROM users WHERE email = '{$email}'";
    $email_result = mysqli_query($connection,$email_query);

    if ($email_result) {
        if (mysqli_num_rows($email_result) == 1) {
            $email_error = "This email is already exist reset password or enter another email";
            $err = "error";
        }
    }

    if ($pwd != $con_pwd){
        $pass_error = 'Password not matched';
        $err = "error";
    }

    if (empty($email_error) && empty($pass_error)) {
        $send_to_db = "INSERT INTO users VALUES ('{$nic}','{$name}','{$address}','{$email}','{$hashed_pw}','{$mobile}','{$type}')";
        $result = mysqli_query($connection, $send_to_db);

        if ($result){

            $success = "success";
        }
        else{
            $error="error";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Title</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">


    <script type="text/javascript" src="js/jquery-3.3.1.slim.min.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

</head>
<body>

<div class="container-fluid " style="margin-top: 2em;padding-bottom: 5em">
    <div class="row justify-content-center " >
        <div class="col-7">
            <div class=" alert alert-danger text-center" style="display: none;<?php if (!empty($err)){echo "display: block";}?>">
                Oops something going wrong try again <a href="register.php"> Try..</a>
            </div>

            <div class=" alert alert-success text-center" style="display: none;<?php if (!empty($success)){echo "display: block";}?>">
                Registration successfully.. <a href="login.php"> Login</a>
            </div>

        </div>
        <div class="col-sm-12 col-md-7 col-lg-7 col-xl-7" style="display: block;<?php if (!empty($success)){echo "display: none";}?>">
            <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                <p class=" font-weight-bold h3 " style="margin-bottom: 1em">Create your account</p>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">First name</label>
                        <input type="text" class="form-control "  name="first_name" placeholder="First Name">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Last name</label>
                        <input type="text" class="form-control" name="last_name" placeholder="Last Name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Email">
                    <small class="text-muted"><p style="color: red; margin: 0px;display: none;<?php if (!empty($email_error)){echo "display: block; border-danger;";}?>">This email is already exist reset password or enter another email</p></small>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Password</label>
                        <input type="password" class="form-control" name="pass" placeholder="Password">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Confirm Password</label>
                        <input type="password" class="form-control" name="con_pass" placeholder="Confirm Password">
                        <small class="text-muted " ><p style="color: red; margin: 0px;display: none;<?php if (!empty($pass_error)){echo "display: block; border-danger;";}?>">Password not matched</p></small>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress">Address</label>
                    <input type="text" class="form-control" name="address" placeholder="270/F Kadawatha Road, Ganemulla">
                </div>
                <div class="form-group">
                    <label for="inputAddress">Mobile</label>
                    <input type="text" class="form-control"  name="mobile" placeholder="+94754923581">
                </div>
                <div class="form-group">
                    <label for="inputAddress">NIC</label>
                    <input type="text" class="form-control"  name="nic" placeholder="972252XXXv">
                </div>
                <div class="form-group">
                    <div class="custom-control custom-checkbox" style="display: none; <?php if (($_SESSION['user_type'])== 'admin'){echo "display: block";}?>">
                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                        <label class="custom-control-label" for="customCheck1">Add user as admin</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" name="reg_user">Sign in</button>
            </form>
        </div>
    </div>
</div>




</body>
</html>



<?php mysqli_close($connection);?>
