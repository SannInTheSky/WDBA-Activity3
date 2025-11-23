<?php
include "conn.php";

if (isset($_POST['submit']))
{
    $student_number = $_POST['student_number'];
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $gender = $_POST['gender'];

   
    $sql = "INSERT INTO students (student_number, first_name, middle_name, last_name, gender) 
            VALUES ('$student_number', '$first_name', '$middle_name', '$last_name', $gender)";

    if(mysqli_query($conn, $sql)) {
        header("location: index.php");
        exit();
    } else {
        $error = "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE HTML>
<html>
<head>
    <title>Add Student</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background-color: #f4f4f4; }
        .container { max-width: 500px; margin: 0 auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        h2 { color: #333; text-align: center; margin-bottom: 20px; }
        .form-group { margin-bottom: 15px; }
        label { display: inline-block; width: 120px; font-weight: bold; color: #555; }
        input[type="text"], select { width: 250px; padding: 8px; border: 1px solid #ddd; border-radius: 4px; font-size: 14px; }
        button { background-color: #007bff; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px; margin-top: 10px; }
        button:hover { background-color: #0056b3; }
        .error { color: red; text-align: center; margin-bottom: 15px; padding: 10px; background-color: #ffe6e6; border-radius: 4px; border: 1px solid #ffcccc; }
        .back-link { text-align: center; margin-top: 15px; }
        .back-link a { color: #007bff; text-decoration: none; }
        .back-link a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add New Student</h2>
        
        <?php if(isset($error)) { ?>
            <div class="error"><?php echo $error; ?></div>
        <?php } ?>
        
        <form action="" method="post">
            <div class="form-group">
                <label>Student number:</label>
                <input type="text" name="student_number" required>
            </div>
            
            <div class="form-group">
                <label>Firstname:</label>
                <input type="text" name="first_name" required>
            </div>
            
            <div class="form-group">
                <label>Middlename:</label>
                <input type="text" name="middle_name">
            </div>
            
            <div class="form-group">
                <label>Lastname:</label>
                <input type="text" name="last_name" required>
            </div>
            
            <div class="form-group">
                <label>Gender:</label>
                <select name="gender" required>
                    <option value="">Select Gender</option>
                    <option value="0">Male</option>
                    <option value="1">Female</option>
                    <option value="2">Other</option>
                </select>
            </div>
            
            <div style="text-align: center;">
                <button type="submit" name="submit">Add Student</button>
            </div>
        </form>
        
        <div class="back-link">
            <a href="index.php">← Back to Student List</a>
        </div>
    </div>
</body>
</html>

<?php
$conn->close();
?>