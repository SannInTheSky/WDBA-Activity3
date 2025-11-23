<?php
$servername = "127.0.0.1";
$password = "root";
$username = "root";
$dbase = "student_db";

$conn = new mysqli($servername, $username, $password, $dbase);

if($conn->connect_error)
{
    die("Connection failed: ".$conn->connect_error);
}

//echo "connection successful";


?>