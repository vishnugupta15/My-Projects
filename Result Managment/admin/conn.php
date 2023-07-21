<?php

$username = "root";
$password = "";
$servername = "localhost";
$dbname = "result_db";

$con = mysqli_connect($servername,$username,$password,$dbname);

if ($con) {
    ?>
    <script>
        // alert("Connection Succesful");
    </script>
    <?php
}
?>