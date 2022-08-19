<?php
require_once ('connection.php');

session_start();
if (!isset($_SESSION['id']) ){
    echo '<script type="text/javascript"> document.location = "Login.php";</script>';
    //   header('location: login.php');
}

$qry ="SELECT * FROM `users` WHERE USER_TYPE = 'artist'  ORDER BY `ID` DESC";
$result = mysqli_query($connection,$qry);

if(isset($_POST['sch'])){

    $sch = $_POST['search'];

    if ($sch == '' ){

        $qry ="SELECT * FROM `users`  ";
        $result = mysqli_query($connection,$qry);
    }else{

        $qry ="SELECT * FROM `users` WHERE NAME like '{$sch}%'";
        $result = mysqli_query($connection,$qry);
    }

}

$qry = "SELECT * FROM `users` WHERE ID = '{$_SESSION['id']}'";
$result1 = mysqli_query($connection,$qry);
$row = mysqli_fetch_array($result1);

// echo $row;

if ($row['vote'] == 1){
    $dis = "disabled title='Already Voted!'";
}
else{
    $dis = "";
}




// echo $qry;

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <meta name="disdription" content="">
    <meta name="viewpoint" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="CSS/homeStyle.css">
    <link rel="stylesheet" type="text/css" href="CSS/serviceStyle.css">
    <link rel="stylesheet" type="text/css" href="CSS/FooterStyle.css">
    <link rel="stylesheet" type="text/css" href="CSS/SlideStyle.css">
    <script src="js/myScript.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php require_once('navBarIn.php');?>


<div class="wrapper" style=" position: absolute; margin-top: 3%; width: 100%; ">
    <h2 style="margin-top: 60px">Voting list 2020</h2>
    
    <div class="line"></div>

    <div>
            <form action="" method="post" style="text-align: center;margin-top: -20px; margin-bottom: 2%">
            <input type="text" name="search" placeholder="Search" style="margin: 0px; padding: 10px;  border: 1px solid black">
            <button type="submit" name="sch" style="margin-left: -4px; padding: 10px; border: 1px solid black; border-left: 0px; background-color: black; color: white"> Search</button>
            
        </form>
        
    </div>

<!-- ---------------------------------------------------- -->
  <!--   <div class="awardDetails" style="margin-left: 6%; ">   
        <img src="img/1.jpg" width="100%" class = "Details" style="border-radius: 50%; border: 3px solid white;">       
        <span></span>
        <p>FName LName</p>
        <button class="vote_btn" style="margin: 10px;padding: 8px 20px;border-radius: 28px">Vote</button>
    </div> -->
<!-- ---------------------------------------------------- -->

<?php

        $i = 1;

        if($result){
            while ($row1 = mysqli_fetch_array($result)) {
                
                echo '<div class="awardDetails" style="margin-left: 3%; margin-right:3%; margin-bottom: 3%;">';
                echo '<img src="'.$row1["IMG"].'" width="100%" class = "Details" style="border-radius: 50%; border: 3px solid white;">';
                echo "<span></span>";
                echo "<p>" . $row1['NAME'] . "</p>";
                echo '<a style="text-decoration: none;" href = "voteMessage.php?'. $row1['ID'] .'"><button class="vote_btn"style="margin: 10px;padding: 8px 20px;border-radius: 28px;" '.$dis.'>Vote</button></a>';
                echo "</div>";

                $i += 1;
            }

        }
?>
    
</div>



</body>
</html>