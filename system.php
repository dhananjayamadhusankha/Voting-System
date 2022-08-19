<?php
session_start();
if (!isset($_SESSION['user_id']) ){
    echo '<script type="text/javascript"> document.location = "Login.php";</script>';
    //   header('location: login.php');
}?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>System</title>

    <meta name="disdription" content="">
    <meta name="viewpoint" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="CSS/homeStyle.css">
    <link rel="stylesheet" type="text/css" href="CSS/serviceStyle.css">
    <link rel="stylesheet" type="text/css" href="CSS/FooterStyle.css">
    <link rel="stylesheet" type="text/css" href="CSS/SlideStyle.css">
    <link rel="stylesheet" type="text/css" href="CSS/systemStyle.css">

    <script src="js/myScript.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body style="background-color: #e8f4f8">
<?php require_once('navBarOut.php');?>

<table class="systemHedder" cellspacing="20px">
    <tr>
        <td>
            <div class="noOfVotes">
                <i class="fa fa-user" aria-hidden="true"></i>
                <span></span>
                <h5>REGISTERED VOTERS</h5>
                <h1>300</h1>

            </div>
        </td>

        <td>
            <div class="noOfVotes" >
                <i class="fa fa-user" aria-hidden="true"></i>
                <span></span>
                <h5>NUMBER OF VOTES</h5>
                <h1>300</h1>
            </div>
        </td>

        <td>
            <div class="noOfVotes" >
                <i class="fa fa-user" aria-hidden="true"></i>
                <span></span>
                <h5>REGISTERED ARTIST</h5>
                <h1>300</h1>
            </div>
        </td>

        <td>
            <div class="noOfVotes" >
                <i class="fa fa-user" aria-hidden="true"></i>
                <span></span>
                <h5>No. Of POSITION</h5>
                <h1>300</h1>
            </div>
        </td>
    </tr>
</table>


</body>
</html>