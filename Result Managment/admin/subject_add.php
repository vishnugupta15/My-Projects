<?php 
    include 'link.php'; 
    include 'conn.php';

    $ids = $_GET['id'];

    $select = "SELECT * FROM class_name WHERE id = '$ids'";
    $queryclass = mysqli_query($con,$select);
    $class_query = mysqli_fetch_array($queryclass);
    $tid = $class_query['id'];
    $t_class_name = $class_query['class_name'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classes</title>

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
            <!-- <li class="nav-item">
                <a href="#">
                    <i class='bx bxs-dashboard' ></i>
                    <span>Dashboard</span>
                    <i class="bx bxs-chevron-right"></i>
                </a>
                <ul class="sub-menu">
                    <li><a href="#">Dashboard</a></li>
                    <li><a href="#">Dashboard</a></li>
                    <li><a href="#">Dashboard</a></li>
                </ul>
            </li> -->
            <li class="nav-item">
                <a href="students.php">
                    <i class='bx bx-user'></i>
                    <span>Students</span>
                </a>
            </li>
            <li class="nav-item active">
                <a href="class.php">
                    <i class='bx bxs-widget'></i>
                    <span>Class</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#">
                    <i class='bx bx-edit'></i>
                    <span>Exam</span>
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
                <a href="#">
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
            <h3>Subjects Maangment</h3>
        </div>

        <div class="card">
            <div class="card-header">
                <p>Subject List</p>

                <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#subjectModal">
                    Add
                </button>
  
                <div class="modal fade" id="subjectModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Subject</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="POST">
                                    <label>Subject Code :</label>
                                    <input type="text" name="subject_code" id="subject_code" class="form-control">
                                    <label>Subject Name :</label>
                                    <input type="text" name="subject_name" id="subject_name" class="form-control">
                                
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success" name="add_class">ADD</button>
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
                            <th>Class Name</th>
                            <th>Subject Code</th>
                            <th>Subject Name</th>
                            <th>Edit Subject</th>
                            <th>Delete Subject</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    // Select Student Data 
                    $num = 1 ;
                    $selectquery = "SELECT * FROM subject_name WHERE class_id=$tid";
                    $query = mysqli_query($con,$selectquery);
                    while($result = mysqli_fetch_array($query)){ ?>
                        <tr>
                            <td><?php echo $num++; ?></td>
                            <td><?php echo $result['class_name'] ?></td>
                            <td><?php echo $result['subject_code'] ?></td>
                            <td><?php echo $result['subject_name'] ?></td>
                            <td><button class="btn btn-warning"><i class='bx bx-edit' data-bs-toggle="modal" data-bs-target="#editsubject<?php echo $result['id'] ?>"></i></button></td>
                            <td><a href="subject_delete.php?id=<?php echo $result[0]?>"><button class="btn btn-danger"><i class='bx bx-trash'></i></button></a></td>
                        </tr>
                        <?php   include 'update_subject.php'; }  ?>
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

// Insert Class Name 

if(isset($_POST['add_class'])){
    $class_name = $t_class_name;
    $class_id = $tid;
    $subject_code = $_POST['subject_code'];
    $subject_name = $_POST['subject_name'];
    $subject_created_date = date("d-m-Y h:i");

    $insertquery = "INSERT INTO subject_name (class_id,class_name,subject_code,subject_name,subject_created_date) VALUES ('$class_id','$class_name','$subject_code','$subject_name','$subject_created_date')";

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