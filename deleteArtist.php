<?php


require_once ('connection.php');

session_start();
if (!isset($_SESSION['user_id']) ){
	echo '<script type="text/javascript"> document.location = "Login.php";</script>';
	//   header('location: login.php');
}

$no = $_SERVER['QUERY_STRING'];

$rmv_qry = "DELETE FROM users WHERE ID = '$no'";
$result = mysqli_query($connection,$rmv_qry);

if ($result){
	echo '<script type="text/javascript"> alert("Successfully Deleted")</script>';
	header('location: artistListOrg.php');

}

?>
