<?php
require_once ('connection.php');

session_start();
if (!isset($_SESSION['id']) ){
    echo '<script type="text/javascript"> document.location = "Login.php";</script>';
    //   header('location: login.php');
}

$qry ="SELECT * FROM `users`    WHERE `USER_TYPE` = 'org' ORDER BY `ID` DESC";
$result = mysqli_query($connection,$qry);

// if(isset($_POST['sch'])){

//     $sch = $_POST['search'];

//     if ($sch == '' ){

//         $qry ="SELECT * FROM `users`  ";
//         $result = mysqli_query($connection,$qry);
//     }else{

//         $qry ="SELECT * FROM `users` WHERE NAME like '{$sch}%'";
//         $result = mysqli_query($connection,$qry);
//     }

// }

// echo $qry;

?>


<!DOCTYPE html>
<html>
<head>
    <title>Artist detsild</title>

    <link rel="stylesheet" type="text/css" href="CSS/artistListStyle.css">

    <link rel="stylesheet" type="text/css" href="CSS/homeStyle.css">
    <link rel="stylesheet" type="text/css" href="CSS/serviceStyle.css">
    <link rel="stylesheet" type="text/css" href="CSS/FooterStyle.css">
    <link rel="stylesheet" type="text/css" href="CSS/SlideStyle.css">
    <script src="js/myScript.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


</head>
<body>
<?php require_once('navBarOut.php');?>

<table id="artist" border="1" style="position: absolute; margin-top: 10%">
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>NIC Number</th>
        <th>Phone Number</th>
        <th style="text-align: center" class="th_action">Action</th>
    </tr>

    <?php

        $i = 1;

        if($result){
            while ($row1 = mysqli_fetch_array($result)) {
                
                echo '<tr>';
                echo '<td class="no" name="no">'.$i.'</td>';
                echo '<td class="name" name="name">'.$row1["NAME"].'</td>';
                echo '<td class="nic" name="nic">'.$row1["NIC"].'</td>';
                echo '<td  class="phone" name="phone">'.$row1["MOBILE"].'</td>';
                echo '<td style="text-align: center">
            <a href="deleteArtist.php?'.$row1["ID"].'" <button class="delete" type="button" name="delete" >Delete</button></a>
        </td>';
                echo '</tr>';

                $i += 1;
            }

        }
?>
<!--     <tr>
        <td class="no" name="no">1</td>
        <td class="pi" name="pi">img</td>
        <td class="nic" name="nic">971300787v</td>
        <td class="name" name="name">Dhananjaya Madhusankha</td>
        <td  class="phone" name="phone">0779518915</td>
        <td style="text-align: center">
            <button class="delete" type="button" name="delete" onclick="document.location'artistDetails.html'">Delete</button>
        </td>
    </tr> -->

</table>

</body>
</html>
