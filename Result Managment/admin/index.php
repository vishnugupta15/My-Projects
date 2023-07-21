<?php  
      session_start();
      include 'link.php';
      include 'conn.php';

    $selectclass = "SELECT * FROM class_name";
    $classquery = mysqli_query($con,$selectclass);
    $totalclass = mysqli_num_rows($classquery);

    $selectsubject = "SELECT * FROM subject_name";
    $subjectquery = mysqli_query($con,$selectsubject);
    $totalsubject = mysqli_num_rows($subjectquery);

    $selectstudent = "SELECT * FROM student_name";
    $studentquery = mysqli_query($con,$selectstudent);
    $totalstudent = mysqli_num_rows($studentquery);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result Managment</title>

</head>
<body>

    <section class="sidebar">
        <div class="logo">
            <a href="#"><img src="img/Prashant Jain.png"><span>Admin</span></a>
        </div>
        <ul class="side-menu">
            <li class="nav-item active">
                <a href="index.php">
                    <i class='bx bxs-dashboard' ></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <!-- <li class="nav-item">
                <a href="#">
                    <i class='bx bxs-dashboard' ></i>
                    <span>Dashboard</span>
                    <i class="bx bxs-chevron-right"></i>
                </a>
                <ul class="sub-menu">
                    <li><a href="#">Dashboard</a></li>
                    <li><a href="#">Dashboard</a></li>
                    <li><a href="#">Dashboard</a></li>
                </ul>
            </li> -->
            <li class="nav-item">
                <a href="students.php">
                    <i class='bx bx-user'></i>
                    <span>Students</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="class.php">
                    <i class='bx bxs-widget'></i>
                    <span>Class</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#">
                    <i class='bx bxs-user'></i>
                    <span>User</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="result.php">
                    <i class='bx bx-registered'></i>
                    <span>Result</span>
                </a>
            </li>
        </ul>
        <ul class="log">
            <li class="nav-item">
                <a href="../login/logOut.php">
                    <i class='bx bx-log-out-circle' ></i>
                    <span>Log Out</span>
                </a>
            </li>
        </ul>
    </section>

    <section class="main">
        <div class="navigation">
            <div class="n1">
                <div class="search">
                    <i class='bx bx-search-alt'></i>
                    <input type="text" name="search" id="search" placeholder="Search Here ....">
                </div>
            </div>
            <div class="profile">
                <i class='bx bx-bell'></i>
                <img src="img/Prashant Jain.png" alt="img">
            </div>
        </div>

        <div class="page-name">
            <h3>Dashboard</h3>
        </div>
        <div class="counting-cards">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="main-part">
                            <div class="cpanel">
                                <div class="icon-part">
                                    <i class='bx bx-user'></i><br>
                                    <small>Total Students</small>
                                    <p><?php echo $totalstudent; ?></p>
                                </div>
                                <div class="card-content-part">
                                    <a href="#"></a>
                                </div>
                            </div>
                            <div class="cpanel cpanel-green">
                                <div class="icon-part">
                                    <i class='bx bxs-widget' ></i><br>
                                    <small>Total Classes</small>
                                    <p><?php echo $totalclass; ?></p>
                                </div>
                                <div class="card-content-part">
                                    <a href="#"></a>
                                </div>
                            </div>
                            <div class="cpanel cpanel-orange">
                                <div class="icon-part">
                                    <i class='bx bx-registered'></i><br>
                                    <small>Total Subjects</small>
                                    <p><?php echo $totalsubject; ?></p>
                                </div>
                                <div class="card-content-part">
                                    <a href="#"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


</body>
</html>