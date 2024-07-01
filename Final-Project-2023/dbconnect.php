<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "hackathon";

$conn = mysqli_connect($servername, $username, $password, $database);

if($conn){
  //echo "Connection Success";
}
else
{
    echo "faild to connect";
}