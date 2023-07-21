<?php

    require 'DBConnect.php';

    if(isset($_POST['cid'])){
        $db = new DBconnect();
        $conn = $db->connect();

        $stmt = $conn->prepare("SELECT * FROM class_name WHERE id = ".$_POST['cid']);
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


?>