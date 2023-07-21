<?php 
    include 'link.php'; 
    include 'conn.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classes</title>

    <script>
        $(document).ready(function(){
            $("#class").change(function(){
                var cid = $("#class").val();
                $.ajax({
                    url : 'get_class.php',
                    method : 'POST',
                    data : 'cid=' + cid
                }).done(function(classes){
                        console.log(classes);
                        classes = JSON.parse(classes);
                        $('#class_id').empty();
                        classes.forEach(function(class_id){
                            $('#class_id').append('<option>' + class_id.id + '</option>')
                        })
                    })
            })
        })
    </script>

</head>
<body>

    <section class="sidebar">
        <div class="logo">
            <a href="#"><img src="img/Prashant Jain.png"><span>Admin</span></a>
        </div>
        <ul class="side-menu">
            <li class="nav-item">
                <a href="index.php">
                    <i class='bx bxs-dashboard' ></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item active">
                <a href="students.php">
                    <i class='bx bx-user'></i>
                    <span>Students</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="class.php">
                    <i class='bx bxs-widget'></i>
                    <span>Class</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#">
                    <i class='bx bxs-user'></i>
                    <span>User</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="result.php">
                    <i class='bx bx-registered'></i>
                    <span>Result</span>
                </a>
            </li>
        </ul>
        <ul class="log">
            <li class="nav-item">
                <a href="../login/logOut.php">
                    <i class='bx bx-log-out-circle' ></i>
                    <span>Log Out</span>
                </a>
            </li>
        </ul>
    </section>

    <section class="main">
        <section class="navigation">
            <div class="n1">
                <div class="search">
                    <i class='bx bx-search-alt'></i>
                    <input type="text" name="search" id="search" placeholder="Search Here ....">
                </div>
            </div>
            <div class="profile">
                <i class='bx bx-bell'></i>
                <img src="img/Prashant Jain.png" alt="img">
            </div>
        </section>

        <div class="page-name">
            <h3>Student Maangment</h3>
        </div>

        <div class="card">
            <div class="card-header">
                <p>Student List</p>

                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#studentModal">
                    Add
                </button>
  
                <div class="modal fade" id="studentModal" tabindex="-1" aria-labelledby="studentModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="studentModalLabel">Add Student</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                <form method="POST">
                                    <label>Student Roll No :</label>
                                    <input type="text" name="student_roll_no" class="form-control"><br>
                                    <label>Student Name :</label>
                                    <input type="text" name="student_name" class="form-control"><br>
                                    <label>Student Email :</label>
                                    <input type="text" name="student_email"  class="form-control"><br>
                                    <label>Class Name </label>
                                    <select class="form-select" aria-label="Default select example" name="class_id" id="class">
                                        <option>Select a Class</option>
                                        <?Php 
                                            require 'data.php';
                                            $classes = loadClass();
                                            foreach ($classes as $class) {
                                                echo "<option id='".$class['id']."' value='".$class['id']."'>".$class['class_name']."</option>";
                                            }
                                        ?>
                                    </select><br>
                                    <label>Gender </label>
                                    <select class="form-select" aria-label="Default select example" name="gender">
                                        <option selected>Select a Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select><br>
                                    <label>Date Of Birth </label>
                                    <input type="date" name="dob"  class="form-control"><br>
                                    
                                
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" name="add_student">ADD</button>
                            </div>
                                </form>
                        </div>
                    </div>
                </div>

            </div>
            <div class="card-body">
                <table id="example" class="table table-striped" style="width:100%; text-align: center;">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Student Roll No</th>
                            <th>Student Name</th>
                            <th>Email Adderss</th>
                            <th>Class Name</th>
                            <th>Gender</th>
                            <th>Date Of Birth</th>
                            <th>Edit Student</th>
                            <th>Delete Student</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    // Select Student Data 
                    $num = 1;
                    $selectquery = "SELECT * FROM student_name";
                    $query = mysqli_query($con,$selectquery);
                    while($result = mysqli_fetch_array($query)){ ?>
                        <tr>
                            <td><?php echo $num++; ?></td>
                            <td><?php echo $result['student_roll_no'] ?></td>
                            <td><?php echo $result['student_name'] ?></td>
                            <td><?php echo $result['student_email'] ?></td>
                            <td><?php echo $result['class'] ?></td>
                            <td><?php echo $result['gender'] ?></td>
                            <td><?php echo $result['dob'] ?></td>
                            <td><button class="btn btn-warning"><i class='bx bx-edit' data-bs-toggle="modal" data-bs-target="#editstudent<?php echo $result['id'] ?>"></i></button></td>
                            <td><a href="student_delete.php?id=<?php echo $result[0]?>"><button class="btn btn-danger"><i class='bx bx-trash'></i></button></a></td>
                        </tr>
                        <?php include 'update_student.php';  }  ?>
                    </tbody>
                </table>
            </div>
        </div>
        
        
    </section>


    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>

</body>
</html>

<!-- PHP Code  -->

<?php 

// Insert Student Name 

if(isset($_POST['add_student'])){
    $student_roll_no = $_POST['student_roll_no'];
    $student_name = $_POST['student_name'];
    $student_email = $_POST['student_email'];
    $class_id = $_POST['class_id'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $student_created_date = date("d-m-Y h:i");

    $selectClass = "SELECT * FROM class_name WHERE id='$class_id'";
    $runquery = mysqli_query($con,$selectClass);
    $resQuery = mysqli_fetch_array($runquery);
    $class_name = $resQuery['class_name'];


    $insertquery = "INSERT INTO student_name (student_roll_no,student_name,student_email,class,class_id,gender,dob,student_created_date) VALUES ('$student_roll_no','$student_name','$student_email','$class_name','$class_id','$gender','$dob','$student_created_date')";

    $res = mysqli_query($con,$insertquery);

    if($res){
        ?>
        <script>
            alert("Data Inserted");
        </script>
        <?php
    }
}

?>