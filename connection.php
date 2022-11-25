<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "dbproject";
$conn = mysqli_connect($servername, $username, $password, $database);
if(!$conn){
    echo "Connection Failed";
}else{
    // echo "Connection Successfull";
}

?>