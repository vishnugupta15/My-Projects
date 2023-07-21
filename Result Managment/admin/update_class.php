<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    
    <div class="modal fade" id="editclass<?php echo $result['id'] ?>" tabindex="-1" aria-labelledby="editclasslabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editclasslabel">Update Class Name</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST">
                        <input type="hidden" name="id" value="<?php echo $result['id'] ?>">
                        <label>Class Code :</label>
                        <input type="text" name="class_code" id="class_code" class="form-control" value="<?php echo $result['class_code'] ?>">
                        <label>Class Name :</label>
                        <input type="text" name="class_name" id="class_name" class="form-control" value="<?php echo $result['class_name'] ?>">
                                    
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="update_class">Update</button>
                </div>
                    </form>
            </div>
        </div>
    </div>



</body>
</html>

<!-- Update Class Name  -->

<?php

if(isset($_POST['update_class'])){
    $id = $_POST['id'];
    $class_name = $_POST['class_name'];
    $class_code = $_POST['class_code'];
    $class_created_date = date("d-m-Y h:i");

    $updatequery = "UPDATE class_name set class_name='$class_name', class_code='$class_code', class_create_date='$class_created_date' WHERE id='$id'";

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