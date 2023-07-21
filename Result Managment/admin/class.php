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
            <h3>Classes Maangment</h3>
        </div>

        <div class="card">
            <div class="card-header">
                <p>Class List</p>

                <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Add
                </button>
  
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Class Name</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="POST">
                                    <label>Class Code :</label>
                                    <input type="text" name="class_code" id="class_code" class="form-control">
                                    <label>Class Name :</label>
                                    <input type="text" name="class_name" id="class_name" class="form-control">
                                
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
                            <th>Class Code</th>
                            <th>Class Name</th>
                            <th>Add Subject</th>
                            <th>Edit Class</th>
                            <th>Delete Class</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    // Select Class Data 
                    $num = 1;
                    $selectquery = "SELECT * FROM class_name";
                    $query = mysqli_query($con,$selectquery);
                    while($result = mysqli_fetch_array($query)){ ?>
                        <tr>
                            <td><?php echo $num++; ?></td>
                            <td><?php echo $result['class_code'] ?></td>
                            <td><?php echo $result['class_name'] ?></td>
                            <td><a href="subject_add.php?id=<?php echo $result[0]?>"><button class="btn btn-success"><i class='bx bx-plus-circle'></i></button></a></td>
                            <td><button class="btn btn-warning"><i class='bx bx-edit' data-bs-toggle="modal" data-bs-target="#editclass<?php echo $result['id'] ?>"></i></button></td>
                            <td><a href="class_delete.php?id=<?php echo $result[0]?>"><button class="btn btn-danger"><i class='bx bx-trash'></i></button></a></td>
                        </tr>
                        <?php include 'update_class.php';  }  ?>
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
    $class_code = $_POST['class_code'];
    $class_name = $_POST['class_name'];
    $class_created_date = date("d-m-Y h:i");

    $insertquery = "INSERT INTO class_name (class_code,class_name,class_create_date) VALUES ('$class_code','$class_name','$class_created_date')";

    $res = mysqli_query($con,$insertquery);

    if($res){
        ?>
        <script>
            alert("Class Added Successfully");
        </script>
        <?php
    }
}

?>