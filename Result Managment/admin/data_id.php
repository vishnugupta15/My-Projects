<?php

    require 'DBConnect.php';

    if(isset($_POST['cid'])){
        $db = new DBconnect();
        $conn = $db->connect();

        $stmt = $conn->prepare("SELECT * FROM student_name WHERE student_name = ".$_POST['sid']);
        $stmt->execute();

        $students = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($students);
    }

?>