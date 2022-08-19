<?php
session_start();
if (!isset($_SESSION['id']) ){
    echo '<script type="text/javascript"> document.location = "Login.php";</script>';
    //   header('location: login.php');
}

require_once ('connection.php');

$qry = "SELECT COUNT(USER_TYPE) as count FROM `users` WHERE USER_TYPE = 'voter' GROUP BY USER_TYPE";
$result = mysqli_query($connection,$qry);
if (mysqli_num_rows($result)){
    $count = mysqli_fetch_array($result);
    $r_v_count = $count['count'];
}
else{
    $r_v_count = 0;
}


$qry = "SELECT COUNT(USER_TYPE) as count FROM `users` WHERE USER_TYPE = 'voter' AND vote = 0 GROUP BY USER_TYPE";
$result = mysqli_query($connection,$qry);
if (mysqli_num_rows($result)){
    $count = mysqli_fetch_array($result);
    $v_count = $count['count'];
}
else{
    $v_count = 0;
}



$qry = "SELECT COUNT(USER_TYPE) as count  FROM `users` WHERE USER_TYPE = 'artist' GROUP BY USER_TYPE";
$result = mysqli_query($connection,$qry);
if (mysqli_num_rows($result) != 0){
    $count = mysqli_fetch_array($result);
    $a_count = $count['count'];
}
else{
    $a_count = 0;
}


$qry = "SELECT COUNT(USER_TYPE) as count FROM `users` WHERE USER_TYPE = 'org' GROUP BY USER_TYPE";
$result = mysqli_query($connection,$qry);

if (mysqli_num_rows($result)){
    $count = mysqli_fetch_array($result);
    $o_count = $count['count'];
}
else{
    $o_count = 0;
}



?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>

    <meta name="disdription" content="">
    <meta name="viewpoint" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="CSS/homeStyle.css">
    <link rel="stylesheet" type="text/css" href="CSS/serviceStyle.css">
    <link rel="stylesheet" type="text/css" href="CSS/FooterStyle.css">
    <link rel="stylesheet" type="text/css" href="CSS/SlideStyle.css">
    <link rel="stylesheet" type="text/css" href="CSS/adminStyle.css">

    <script src="js/myScript.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body style="background-color: #e8f4f8">
<?php require_once('navBarOut.php');?>

<table class="systemHedder" cellspacing="20px">
    <tr>
        <td>
            <a href="voterListOrg.php"> <div class="noOfVotes">
                <i class="fa fa-user" aria-hidden="true"></i>
                <span></span>
                <h5>REGISTERED VOTERS</h5>
                <h1><?php echo $r_v_count; ?></h1>
            </div>
            </a>
        </td>

        <td>
            <a href="nonVote.php"><div class="noOfVotes" >
                <i class="fa fa-user" aria-hidden="true"></i>
                <span></span>
                <h5>NUMBER OF VOTES</h5>
                <h1><?php echo $v_count; ?></h1>
            </div>
            </a>
        </td>

        <td>
            <a href="artistListOrg.php"><div class="noOfVotes" >
                <i class="fa fa-user" aria-hidden="true"></i>
                <span></span>
                <h5>REGISTERED ARTIST</h5>
                <h1><?php echo $a_count; ?></h1>
            </div>
            </a>
        </td>

        <td>
            <a href="orgTeam.php"><div class="noOfVotes" >
                <i class="fa fa-user" aria-hidden="true"></i>
                <span></span>
                <h5>Organization Team</h5>
                <h1><?php echo $o_count; ?></h1>
            </div>
            </a>
        </td>
    </tr>
</table>

<div style="text-align: center">
    <h2 style="text-align: center; color: red">Dead Time</h2>
    <div class="date_time" style="width: 20%; margin-left: 40%">
        <table class="time">
            <tr>
                <td>Date</td>
                <td>Time</td>
            </tr>
            <tr>

                <div style="margin-bottom: 3%">
                    <td>
                        <label for="date"><b></b></label>
                        <input type="date" placeholder="YYYY/MM/DD" name="date" id="date">
                    </td>
                    <td><label for="time"><b></b></label>
                        <input type="time" placeholder="Time" name="date" id="date">
                    </td>
                </div>
            </tr>
        </table>
        <!--        <div class="org_judge" style="text-align: center; padding: 4%">-->
        <!--            <h3 style="padding: 4%; margin-top: 3%">Judge Board & Organizattion Team</h3>-->
        <!--            <button class="org_btn" type="button" onclick="document.location='Jud&OrgRegForm.php'">CLICK</button>-->
        <!--        </div>-->
    </div>
</div>
<div style="text-align: center">
    <div class="org_judge" style="text-align: center; padding: 4%">
        <h3 style="margin-top: 5%; padding: 1%">Judge Board & Organizattion Team</h3>
        <button class="org_btn" type="button" onclick="document.location='Jud&OrgRegForm.php'">REGISTER</button>
    </div>
</div>


</body>
</html>