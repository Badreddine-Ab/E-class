<?php 
    session_start();
    require_once 'connect_db.php';
    require_once 'library/library.php';
    if(!isLoged()){
        redirect ('index');
        die();
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashbord Admin</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
        <!-- Core theme CSS (includes Bootstrap)-->
        <link rel="stylesheet" href="css/bootstrap.css">
    </head>
    <body>
        <div class="d-flex" id="wrapper">
        <?php
            require_once 'SideBar.php'
        ?>

            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <?php
                    require_once 'NavBar.php'
                ?>
                <!-- Page content-->
                <div class="container-fluid card-group mt-3">
                    <div class="card bg-card1 flex-column me-3 border-0 p-3" style="width: 16rem;">
                        <i class="bi bi-mortarboard fs-1 me-3o"></i>
                        <p class="para">Students</p>
                        <?php
                            $results = mysqli_query($conn, "SELECT COUNT(*) as countstudent FROM students");
                            while($student = mysqli_fetch_array($results)){ ?>
                        <p class="card-text text-end fs-2 fw-bold"><?php echo $student['countstudent'];} ?></p>
                    </div>

                    <div class="card bg-card2 flex-column me-3 bodrder-0 border-white p-3" style="width: 16rem;">
                        <i class="bi bi-bookmark fs-1 me-3"></i>
                        <p class="para">Course</p>
                        <?php
                            $results = mysqli_query($conn, "SELECT COUNT(*) as countcourses FROM courses");
                            while($courses = mysqli_fetch_array($results)){ ?>
                        <p class="card-text info fs-2 text-end fs-2 fw-bold"><?php echo $courses['countcourses'];} ?></p>
                    </div>
              
                    <div class="card bg-card3 flex-column me-3 bodrder-0 border-white p-3" style="width: 16rem;">
                        <i class="bi bi-coin fs-1 me-3"></i>
                        <p class="para">Payements</p>
                        <?php
                            $results = mysqli_query($conn, "SELECT SUM(Amount_Paid) as countpayment FROM `payment_details`");
                            while($courses = mysqli_fetch_array($results)){ ?>
                        <p class="card-text right text-end fs-2 fw-bold"><span class="fs-5">DHS</span><?php echo $courses['countpayment'];} ?></p>
                    </div>
              
                    <div class="card bg-card4 flex-column bodrder-0 border-white p-3" style="width: 16rem;">
                        <i class="bi bi-person fs-1 me-3 li  c-light"></i>
                        <p class="para1">Users</p>
                        <p class="card-text ri $lightht text-end fs-2 fw-bold">3</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
