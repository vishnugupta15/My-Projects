<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    
    <div class="modal fade" id="editsubject<?php echo $result['id'] ?>" tabindex="-1" aria-labelledby="editclasslabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editclasslabel">Update Subject </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST">
                        <input type="hidden" name="id" value="<?php echo $result['id'] ?>">
                        <label>Subject Code :</label>
                        <input type="text" name="subject_code" id="subject_code" class="form-control" value="<?php echo $result['subject_code'] ?>">
                        <label>Subject Name :</label>
                        <input type="text" name="subject_name" id="subject_name" class="form-control" value="<?php echo $result['subject_name'] ?>">
                                    
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="update_subject">Update</button>
                </div>
                    </form>
            </div>
        </div>
    </div>



</body>
</html>

<!-- Update Class Name  -->

<?php

if(isset($_POST['update_subject'])){
    $id = $_POST['id'];
    $subject_code = $_POST['subject_code'];
    $subject_name = $_POST['subject_name'];
    $subject_created_date = date("d-m-Y h:i");

    $updatequery = "UPDATE subject_name set subject_code='$subject_code',subject_name='$subject_name', subject_created_date='$subject_created_date' WHERE id='$id'";

    $res = mysqli_query($con,$updatequery);

    if($res) {
        ?>
        <script>
            // alert("Data Updated");
        </script>
        <?php
    }
}

?>