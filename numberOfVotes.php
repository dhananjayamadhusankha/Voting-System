<?php
session_start();
if (!isset($_SESSION['user_id']) ){
    echo '<script type="text/javascript"> document.location = "Login.php";</script>';
    //   header('location: login.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registered voters</title>

    <link rel="stylesheet" type="text/css" href="CSS/numberOfVotesStyle.css">

    <link rel="stylesheet" type="text/css" href="CSS/homeStyle.css">
    <link rel="stylesheet" type="text/css" href="CSS/serviceStyle.css">
    <link rel="stylesheet" type="text/css" href="CSS/FooterStyle.css">
    <link rel="stylesheet" type="text/css" href="CSS/SlideStyle.css">
    <script src="js/myScript.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


</head>
<body>
<?php require_once('navBarOut.php');?>
<div class="voters" style="position: absolute; margin-top: 10%; width: 100%" >
    <h2 style="text-align: center">Number of Votes</h2>
    <br>
    <table id="artist" border="1" style="position: absolute;">
        <tr>
            <th>#</th>
            <th>NIC Number</th>
            <th>Name</th>
            <th>Phone Number</th>
            <th style="text-align: center" class="th_action">Action</th>
        </tr>
        <tr>
            <td class="no" name="no">1</td>
            <td class="nic" name="nic">971300787v</td>
            <td class="name" name="name">Dhananjaya Madhusankha</td>
            <td  class="phone" name="phone">0779518915</td>
            <td style="text-align: center">
                <button class="delete" type="button" name="delete" onclick="document.location'artistDetails.html'">Delete</button>
            </td>
        </tr>

    </table>
</div>

</body>
</html>
