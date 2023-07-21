<?php include 'admin/link.php'; include 'admin/conn.php'; 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title> 
</head>
<body>
    
    <div class="container">
        <div id="main">
            <div class="mt-4 pt-3" style="text-align:right;">
                <a href="login/login.php"><button class="btn btn-info">Login</button></a>
            </div>
            <div class="heading" style="text-align:center;">
                <h2 class="mt-4 p-4">Welcome To Our Result Managment System</h2>
                <hr style="background-color:red; height:4px; border-radius:6px;">
            </div>
            
            <div class="card p-4">
                <form method="POST" action="marksheet.php">
                    <label>Select a Class </label>
                    <select name="class_name" id="class_name" class="form-control" required>
                        <option required>Select Class Name</option>
                        <?Php 
                            require 'admin/data.php';
                            $classes = loadClass();
                            foreach ($classes as $class) {
                                echo "<option id='".$class['id']."' value='".$class['id']."'>".$class['class_name']."</option>";
                            }
                        ?>
                    </select><br>
                    <label>Enter Your Roll No</label>
                    <input type="text" name="student_roll_no" id="student_roll_no" class="form-control" required><br>
                        <button class="btn btn-outline-primary" type="submit" name="get_result">Get Result</button>
                </form>
            </div>
        </div>
    </div>

</body>
</html>