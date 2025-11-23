<?php

include "conn.php";

$sql = "SELECT id, student_number, 
concat(first_name, ' ', middle_name, ' ', last_name) AS 'Full_Name',
CASE gender WHEN 0 THEN  'Male' WHEN 1 THEN 'Female' 
END as 'gender' 
FROM school_db.students ORDER BY id asc limit 100";

$result = $conn->query($sql);

echo "<table border = 1 cellspacing = 1 cellpadding = 0> <tr>
    <th>ID</th>
    <th>Student Number</th>
    <th>Full Name</th>
    <th>Gender</th>
</tr>";

if($result->num_rows>0){
    while($row = $result-> fetch_assoc()){
        echo "<tr>";
            echo "<td>".$row["id"]. "</td>";
            echo "<td>".$row["student_number"]. "</td>";
            echo "<td>".$row["Full_Name"]. "</td>";
            echo "<td>".$row["gender"]. "</td>";
        echo "</tr>";
    }
}

else{
    echo "no results found.";
}

?>