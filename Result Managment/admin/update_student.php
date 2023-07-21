<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    
    <div class="modal fade" id="editstudent<?php echo $result['id'] ?>" tabindex="-1" aria-labelledby="editstudentlabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editstudentlabel">Update Student </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                    <div class="modal-body">
                        <form method="POST">
                            <input type="hidden" name="id" value="<?php echo $result['id'] ?>">
                            <label>Student Roll No :</label>
                            <input type="text" name="student_roll_no" class="form-control" value="<?php echo $result['student_roll_no']; ?>"><br>
                            <label>Student Name :</label>
                            <input type="text" name="student_name" class="form-control" value="<?php echo $result['student_name']; ?>"><br>
                            <label>Student Email :</label>
                            <input type="text" name="student_email"  class="form-control" value="<?php echo $result['student_email']; ?>"><br>
                            <label>Gender </label>
                            <select class="form-select" aria-label="Default select example" name="gender">
                                <option selected>Select a Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select><br>
                            <label>Date Of Birth </label>
                            <input type="date" name="dob"  class="form-control" value="<?php echo $result['dob']; ?>"><br>
                                    
                                
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="update_student">Update</button>
                    </div>
                    </form>
            </div>
        </div>
    </div>



</body>
</html>

<!-- Update Class Name  -->

<?php

if(isset($_POST['update_student'])){
    $id = $_POST['id'];
    $student_roll_no = $_POST['student_roll_no'];
    $student_name = $_POST['student_name'];
    $student_email = $_POST['student_email'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $student_created_date = date("d-m-Y h:i");

    $updatequery = "UPDATE student_name set student_roll_no='$student_roll_no',student_name='$student_name', student_email='$student_email',gender='$gender',dob='$dob',student_created_date='$student_created_date' WHERE id='$id'";

    $res = mysqli_query($con,$updatequery);
}

?>