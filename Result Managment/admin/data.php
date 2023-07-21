<?php

    require 'DBConnect.php';

    if(isset($_POST['cid'])){
        $db = new DBconnect();
        $conn = $db->connect();

        $stmt = $conn->prepare("SELECT * FROM student_name WHERE class_id = ".$_POST['cid']);
        $stmt->execute();

        $students = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($students);
    }



    function loadClass() {
        $db = new DBconnect();
        $conn = $db->connect();

        $stmt = $conn->prepare("SELECT * FROM class_name");
        $stmt->execute();

        $class = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $class;

    }

    function loadStudent() {
        $db = new DBconnect();
        $conn = $db->connect();

        $stmt = $conn->prepare("SELECT * FROM student_name");
        $stmt->execute();

        $student = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $student;
    }


?>