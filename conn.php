<?php
$servername = "localhost";
$password = "root";
$username = "root";
$dbase = "school_db";

$conn = new mysqli($servername, $username, $password, $dbase);

if($conn->connect_error)
{
    die("Connection failed: ".$conn->connect_error);
}

echo "connection successful";


?>