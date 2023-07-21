<?php include '../admin/conn.php'; 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log - In</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="bg"></div>

    <form method="POST">
        <div class="form-field">
            <input type="text" placeholder="Email / Username" name="email" required/>
        </div>
  
        <div class="form-field">
            <input type="password" placeholder="Password" name="password" required/>                         </div>
  
            <div class="form-field">
            <button class="btn" type="submit" name="submit">Log in</button>
        </div>
    </form>


</body>
</html>

<?php

    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $pswd = $_POST['password'];

        $select = "SELECT * FROM login WHERE email='$email' && pswd='$pswd' ";
        $query = mysqli_query($con,$select);

        $email_count = mysqli_num_rows($query);

        if($email_count == 1){

			$_SESSION['email'] = $email;
			?>
				<script>
					location.replace("../admin/index.php");
				</script>
			<?php
        }
        else{
            ?>
                <script>
                    alert("Wrong Login Information");
                </script>
            <?php
        }  
    }
?>