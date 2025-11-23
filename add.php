<?php
include "conn.php";

if (isset($_POST)['submit'])
{
    $student_number = $_POST['student_number'];
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $gender = $_POST['gender'];

    $sql = "INSERT INTO school_db.students(student_number, first_name, middle_name, last_name, gender) 
values('$student_number', '$first_name', '$middle_name', '$last_name', '$gender')";

    $result = mysqli_query($conn, $sql) or die("Connection failed.".$conn->connect_error);

    if($result)
    {
        header("location: index.php?");
    }

    else
    {
        echo "Not successful.";
    }
}

$conn->close();
?>