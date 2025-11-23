<?php
include "conn.php";

$sql = "SELECT id, student_number, 
        CONCAT(first_name, ' ', COALESCE(middle_name, ''), ' ', last_name) AS 'Full_Name',
        CASE 
            WHEN gender = 'Male' OR gender = '0' THEN 'Male'
            WHEN gender = 'Female' OR gender = '1' THEN 'Female'
            ELSE gender 
        END as 'gender' 
        FROM student_db.students 
        ORDER BY id DESC 
        LIMIT 100";

$result = $conn->query($sql);

// Check if query was successful first
if ($result === false) {
    echo "Error: " . $conn->error;
    $conn->close();
    exit();
}

echo "<table border='1' cellspacing='1' cellpadding='5' style='border-collapse: collapse;'> 
    <tr>
        <th>ID</th>
        <th>Student Number</th>
        <th>Full Name</th>
        <th>Gender</th>
    </tr>";

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        echo "<tr>";
        echo "<td>".$row["id"]."</td>";
        echo "<td>".$row["student_number"]."</td>";
        echo "<td>".$row["Full_Name"]."</td>";
        echo "<td>".$row["gender"]."</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No results found.";
}

$conn->close();
?>

<br>
<a href='add.php'>ADD NEW RECORD</a>