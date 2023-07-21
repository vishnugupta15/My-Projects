<?php

    include 'conn.php';

    $id = $_GET['id'];

    $deletequery = "DELETE FROM class_name WHERE id=$id";

    $dquery = mysqli_query($con,$deletequery);

    if ($dquery) {
        ?>
        <script>
            alert("Data Deleted Sucessfully");
        </script>
        <?php
    }

    header('location:class.php');
?>