<?php

$host = "localhost";
$user = "root";
$pass = "";

$db = "test1";

$connection = mysqli_connect($host,$user,$pass ,$db);
if($connection){
    mysqli_select_db($connection,$db);
    // echo "asasa";

}
else{
    die(mysql_error());
}



?>