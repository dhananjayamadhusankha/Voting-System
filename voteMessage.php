
<?php

session_start();
if (!isset($_SESSION['id']) ){
    echo '<script type="text/javascript"> document.location = "Login.php";</script>';
    //   header('location: login.php');
}

require_once ('connection.php');
$a_id = $_SERVER['QUERY_STRING'];

$v_id = $_SESSION['id'];

date_default_timezone_set("Asia/Colombo");
$time =  date("H:i:s");
$date = date("Y-m-d");


$rmv_qry = "INSERT INTO `voting` (`ID`, `V_ID`, `A_ID`, `VOTE`, `DATE`, `TIME`) VALUES (NULL, '{$v_id}', '{$a_id}', '1', '{$date}', '{$time}');";
$result = mysqli_query($connection,$rmv_qry);

if ($result){
    $qry = "UPDATE `users` SET `vote` = '1' WHERE `users`.`ID` = '{$v_id}'; ";
    $result = mysqli_query($connection,$qry);

    if ($result){
        echo '<script type="text/javascript"> alert("Successfully Voted")</script>';
    }

    else{
        echo '<script type="text/javascript"> alert("Error update")</script>';
    }


    
    // header('location: artistListOrg.php');
 
}else{
   echo '<script type="text/javascript"> alert("Error")</script>';
}

$qry = "SELECT * FROM `users` WHERE ID = '{$a_id}'";
$result = mysqli_query($connection,$qry);
$row = mysqli_fetch_array($result);


// echo '<script type="text/javascript"> alert("'.$qry.'")</script>';

?>


<!DOCTYPE html>
<html>
<head>
    <title>Vote Message</title>

    <link rel="stylesheet" type="text/css" href="CSS/voteMessageStyle.css">
    <link rel="stylesheet" type="text/css" href="CSS/homeStyle.css">

    <link rel="stylesheet" type="text/css" href="CSS/homeStyle.css">
    <link rel="stylesheet" type="text/css" href="CSS/serviceStyle.css">
    <link rel="stylesheet" type="text/css" href="CSS/FooterStyle.css">
    <link rel="stylesheet" type="text/css" href="CSS/SlideStyle.css">
    <script src="js/myScript.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


</head>
<body>
<?php require_once('navBarIn.php');?>




<div class="status">
    <table class="status_table" cellspacing="1%">
        <tr>
            <td>
                <div class="artistPic">
                    <div class="artistImg" style="padding: 1%">
                        <img src="<?php  echo $row['IMG'];?>" width="100%" class = "Details" style="border-radius: 50%; border: 2px solid white">
                    </div>
                </div>
            </td>

            <td class="artistDetails" style="padding: 1%">
                <h3>Vote Successfully!</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
                <table class="artistVote">
                    <tr>
                        <td class="bold">ID No.</td>
                        <td><?php  echo $row['ID'];?></td>
                    </tr>
                    <tr>
                        <td class="bold">Name</td>
                        <td><?php  echo $row['NAME'];?></td>
                    </tr>
                    <tr>
                        <td class="bold">Date</td>
                        <td><?php  echo $date;?></td>
                    </tr>
                    <tr>
                        <td class="bold">Time</td>
                        <td><?php  echo $time;?></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

</div>

<div class="ok_div" >

    <h4 class="ok" >Return to Home</h4>
  
    <button  type="button" class="ok_btn" onclick="document.location'index.php'">Home</button>
</div>

</body>
</html>
