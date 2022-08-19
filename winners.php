<?php

require_once ('connection.php');

session_start();
// if (!isset($_SESSION['id']) ){
//     echo '<script type="text/javascript"> document.location = "Login.php";</script>';
//     //   header('location: login.php');
// }






?>


<!DOCTYPE html>
<html>
<head>
    <title>Voter List</title>

    <link rel="stylesheet" type="text/css" href="CSS/winnersStyle.css">

    <link rel="stylesheet" type="text/css" href="CSS/homeStyle.css">
    <link rel="stylesheet" type="text/css" href="CSS/serviceStyle.css">
    <link rel="stylesheet" type="text/css" href="CSS/FooterStyle.css">
    <link rel="stylesheet" type="text/css" href="CSS/SlideStyle.css">
    <script src="js/myScript.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


</head>
<body>
<?php require_once('navBarIn.php');?>
<div class="winners" style="margin-top: 10%; position: absolute">


    <h2>WINNERS - ATLAS AWARD 2020</h2>
    <div class="placeNo">
        <h4>Winning Places</h4>
    </div>



    <?php

        $i = 1;
        $qry ="SELECT *,COUNT(ID) as count FROM `voting` GROUP BY A_ID ORDER BY COUNT(ID) DESC ";
        $result = mysqli_query($connection,$qry);
        // echo $qry;


        if($result){
            while ($row = mysqli_fetch_array($result)) {

                $qry1 ="SELECT * FROM `users` WHERE ID = '{$row['A_ID']}'";
                $result1 = mysqli_query($connection,$qry1);
                $row1 = mysqli_fetch_array($result1);

                echo '<div class="position">
                    <div class="place">
                        <h4>'.$i.'# Place</h4>
                        </div>
                        <div class="place_table">
                            <table class="winnersPlace" >
                                <tr>
                                <td rowspan="2"> <img src="'.$row1["IMG"].'" width="100px" ></td>
                                    <td>Name</td>
                                    <td>ID No.</td>
                                    <td>No. of Total Votes</td>
                                </tr>
                                <tr>
                                    
                                    <td>'.$row1["NAME"].'</td>
                                    <td>'.$row1["ID"].'</td>
                                    <td>'.$row["count"].'</td>
                                </tr>
                            </table>
                        </div>
                </div>';
                
                $i += 1;
    
                
            }

            

        }
?>

    
</div>

</body>
</html>
