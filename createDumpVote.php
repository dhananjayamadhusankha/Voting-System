<?php 

require_once ('connection.php');

date_default_timezone_set("Asia/Colombo");
$time =  date("H:i:s");
$date = date("Y-m-d");

$count = 900;

for($i = 0; $i<$count;$i++){
	$rmv_qry = "INSERT INTO `voting` (`ID`, `V_ID`, `A_ID`, `VOTE`, `DATE`, `TIME`) VALUES (NULL, '-1', '54', '1', '{$date}', '{$time}');";
	$result = mysqli_query($connection,$rmv_qry);


	
	# code...

}

echo "Success" .$count;



?>