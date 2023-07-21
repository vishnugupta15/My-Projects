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
                    url : 'data.php',
                    method : 'POST',
                    data : 'cid=' + cid
                }).done(function(students){
                        // console.log(students);
                        students = JSON.parse(students);
                        $('#student_id').empty();
                        var student_html = '';
                        for(var i=0; i<students.length; i++){
                            
                            student_html += '<div class="form-group">';
                            student_html += '<option value="'+students[i].id+'">' + students[i].student_name + '</option>';
                            student_html += '</div>';
                        }
                        $('#student_id').html(student_html);
                    })
            })
        })

        $(document).ready(function(){
            $("#class").change(function(){
                var cid = $("#class").val();
                $.ajax({
                    url : 'data_class.php',
                    method : 'POST',
                    data : 'cid=' + cid
                }).done(function(classes){
                        console.log(classes);
                        classes = JSON.parse(classes);
                        $('#class_name').empty();
                        var class_html = '';
                        for(var i=0; i<classes.length; i++){
                            
                            class_html += '<div class="form-group">';
                            class_html += '<input type="hidden" name="class_name" value="'+classes[i].class_name+'" />';
                            class_html += '</div>';
                        }
                        $('#class_name').html(class_html);
                    })
            })
        })

        $(document).ready(function(){
            $("#class").change(function(){
                var cid = $("#class").val();
                $.ajax({
                    url : 'data_subject.php',
                    method : 'POST',
                    data : 'cid=' + cid
                }).done(function(subjects){
                        console.log(subjects);
                        subjects = JSON.parse(subjects);
                        $('#subject_name').empty();
                        var subject_html = '';
                        for(var i=0; i<subjects.length; i++){
                            
                            subject_html += '<div class="form-group">';
                            subject_html += '<label>'+subjects[i].subject_name+'</label>';
                            subject_html += '<input type="text" name="marks[]" class="form-control" required data-parsley-type="integer" data-parsley-trigger="keyup" />';
                            subject_html += '<input type="hidden" name="subject_id[]" value="'+subjects[i].id+'" />';
                            subject_html += '</div>';
                            // console.log(subject);
                        }
                        $('#subject_name').html(subject_html);
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
            <li class="nav-item">
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
            <li class="nav-item active">
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
            <h3>Result Maangment</h3>
        </div>

        <div class="card">
            <div class="card-header">
                <p>Result List</p>

                <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#resultModal">
                    Add
                </button>
  
                <div class="modal fade" id="resultModal" tabindex="-1" aria-labelledby="resultModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="resultModalLabel">Add Result </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="POST">
                                    <label>Class</label>
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
                                    <label>Student Name</label>
                                    <select class="form-select" aria-label="Default select example" name="student_id" id="student_id">
                                        <option>Select a Name</option>
                                    </select><br>
                                    <div id="subject_name"> Subject Name</div>
                                    <div id="class_name"></div>
                                
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success" name="add_result">ADD</button>
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
                            <th>Student Name</th>
                            <th>Percentage</th>
                            <th>Edit Result</th>
                            <th>Delete Result</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 

                    $num = 1;
                    $selectquery = "SELECT * FROM result INNER JOIN class_name 
                    ON class_name.id = result.class_id INNER JOIN student_name ON student_name.id = result.student_id ";
                    $query = mysqli_query($con,$selectquery);
                    while($result = mysqli_fetch_array($query)){ ?>
                        <tr>
                            <td><?php echo $num++; ?></td>
                            <td><?php echo $result['class_name'] ?></td>
                            <td><?php echo $result['student_name'] ?></td>
                            <td><?php echo $result['percentage']; ?></td>
                            <td><button class="btn btn-warning"><i class='bx bx-edit' data-bs-toggle="modal" data-bs-target="#editresult<?php echo $result['id'] ?>"></i></button></td>
                            <td><a href="result_delete.php?id=<?php echo $result[0]?>"><button class="btn btn-danger"><i class='bx bx-trash'></i></button></a></td>
                        </tr>
                        <?php // include 'update_result.php';  
                    }  ?>
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

// Insert Result Name 

if(isset($_POST['add_result'])){
    $class_id = $_POST['class_id'];
    $subject_id_input = $_POST['subject_id'];
    $student_id = $_POST['student_id'];
    $marks_input = $_POST["marks"];
    $result_created_date = date("d-m-Y");

    $count = 0;
    $total =0;

    for($i=0; $i < count($marks_input); $i++){
        $total = $total + $marks_input[$i];   
    }
    $percentage = ($total)/count($marks_input);
    $status = "";
    if($percentage <= 33){
        $status = "FAIL";
    }
    else{
        $status = "PASS";
    }

    $insertquery = "INSERT INTO result (class_id,student_id,total_marks,percentage,status,result_create_date) VALUES ('$class_id','$student_id','$total','$percentage','$status','$result_created_date')";

    $res = mysqli_query($con,$insertquery);

        if($res){
            ?>
            <script>
                // alert("Data Inserted");
            </script>
            <?php
        }

    $result_id = mysqli_insert_id($con);
    for($i=0; $i < count($subject_id_input); $i++){
        $marks_data = array(
            $subject_id = $subject_id_input[$i],
            $marks = $marks_input[$i],
            
        );
        $insertquery1 = "INSERT INTO marks (result_id,subject_id,marks) VALUES ('$result_id','$subject_id','$marks')";

        $res1 = mysqli_query($con,$insertquery1);

        if($res1){
            ?>
            <script>
                // alert("Data Marks Inserted");
            </script>
            <?php
        }
    }
}

?>