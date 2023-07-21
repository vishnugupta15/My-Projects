<?php // include 'admin/link.php'; 
      include 'admin/conn.php'; 

      

      if(isset($_POST['get_result'])){
    $class_name = $_POST['class_name'];
    $roll_no = $_POST['student_roll_no'];
    // print_r($_POST);

    $selectqueryRollno = "SELECT * FROM student_name WHERE student_roll_no='$roll_no'";

    $class_id = '';
	$student_id = '';
	$result_id = '';

    $runquery = mysqli_query($con,$selectqueryRollno);
    // print_r($runquery);

        foreach($runquery as $student_data){
            $student_id = $student_data['id'];
            $class_id = $student_data['class_id'];
            $student_name = $student_data['student_name'];
            $student_roll_no = $student_data['student_roll_no'];
            $student_email = $student_data['student_email'];
            $student_gender = $student_data['gender'];
            $student_dob = $student_data['dob'];
            $class_name2 = $student_data['class'];
        }

        $selectqueryClass = "SELECT * FROM class_name WHERE class_name='$class_name'";

        $runquery2 = mysqli_query($con,$selectqueryClass);

        $seletqueryResult = "SELECT * FROM result WHERE class_id = '$class_id' AND student_id = '$student_id'";

        $runquery3 = mysqli_query($con,$seletqueryResult);

        foreach($runquery3 as $result){
            $result_id = $result['result_id'];
            $result_date = $result['result_create_date'];
            $percentage = $result['percentage'];
            $total_marks = $result['total_marks'];
            $status = $result['status'];
            // echo $result_id;
            // echo $result_date;
    
    
            $showResult = "SELECT subject_name.subject_name, marks.marks FROM marks INNER JOIN subject_name ON subject_name.id = marks.subject_id WHERE marks.result_id='$result_id'";

            $runquery4 = mysqli_query($con,$showResult);
            foreach($runquery4 as $marks){
                $subject_name = $marks['subject_name'];
                $marks = $marks['marks'];
            }
            // print_r($subject_name);
            // print_r($marks);
        }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
</head>
<body>
    <div class="container">
        <div class="marksheet" id="marksheet">
            <div class="card m-4 p-4">
                <div>
                    <table class="table table-striped table-bordered">
                        <tr>
                            <td colspan="2" style="text-align:center;font-size:22px; font-weight:700; color:#594ef7; padding:15px 0px;" id="table_heading"><span>Result - </span><?php echo $class_name2; ?></td>
                                
                        </tr>
                        <tr>
                            <td><b>Student Name  </b></td>
                            <td><?php echo $student_name; ?></td>
                        </tr>
                        <tr>
                            <td><b>Student Roll No  </b></td>
                            <td><?php echo $student_roll_no; ?></td>
                        </tr>
                        <tr>
                            <td><b>Student Email  </b></td>
                            <td><?php echo $student_email; ?></td>
                        </tr>
                        <tr>
                            <td><b>Class Name   </b></td>
                            <td><?php echo $class_name2; ?></td>
                        </tr>
                        <tr>
                            <td><b>Gender  </b></td>
                            <td><?php echo $student_gender; ?></td>
                        </tr>
                        <tr>
                            <td><b>Date Of Birth </b></td>
                            <td><?php echo $student_dob; ?></td>
                        </tr>
                    </table>
                </div>
                    
                <table class="table table-striped table-bordered table-hover" style="text-align:center;">
                            
                    <tr>
                        <th>S.No.</th>
                        <th>Subject Name</th>
                        <th>Obtain Marks</th>
                        <th>Total Marks</th>
                    </tr>
                    <?php 
                    $sn = 1;
                    $total =0;
                        foreach($runquery4 as $marks){
                            $subject_name = $marks['subject_name'];
                            $marks = $marks['marks'];
                            
                    ?>
                    <tr>
                        <td><?php echo $sn++; ?></td>
                        <td><?php echo $subject_name; ?></td>
                        <td><?php echo $marks; ?></td>
                        <td>100</td>
                    </tr>
                    <?php } ?>

                    <tr>
                        <td></td>
                        <td></td>
                        <td><b>Total Marks</b></td>
                        <td style="font-size:18px;"><?php echo $total_marks; ?>/400</td>
                    </tr>
                        

                    <tr>
                        <td></td>
                        <td><b>Percentage</b></td>
                        <td style="color:#594ef7; font-weight:600; font-size:20px;"><?php echo $percentage; echo "%" ?></td>
                    </tr>

                    <tr>
                        <td></td>
                    </tr>

                    <tr>
                        <td>Result Date</td>
                        <td><?php echo $result_date; ?></td>
                        <td><strong>Status</strong></td>
                        <td style="color:green; font-weight:700;"><?php echo $status; ?></td>
                    </tr>
                            
                </table> <br>
                <button class="btn btn-outline-success" onclick="window.print();">Print</button>
            </div>
        </div>
    </div>


</body>
</html>