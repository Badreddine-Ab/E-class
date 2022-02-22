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
            <div id="page-content-wrapper" style="height:calc(100vh - 10px);" class="overflow-auto">
                <!-- Top navigation-->
                <?php
                    require_once 'NavBar.php'
                ?>

                <div class="bg-light navbar-light ">
                    <nav class="navbar navbar-expand-lg pt-3">
                            <div class="container-fluid">
                                <h1 class="fs-2 ps-3">Courses </h1>
                                <form class="d-flex pe-3">
                                <i class="bi bi-arrows-expand fs-5 me-3"></i>
                                <a href="AddCourse.php" class="btn btn-outline-success ps-5 pe-5 bg-info text-light border-0">ADD NEW COURSE</a>
                                </form>
                            </div>
                    </nav>

                <!-- <i class="bi bi-three-dots"></i> -->
                <?php $resultat = mysqli_query($conn, "SELECT * FROM `courses`") ;?>
                
                    <div class="container-fuild card-group d-flex flex-wrap gapy-3 ms-3  ">
                    <?php while($course = mysqli_fetch_array($resultat)) {?>
                    <div class="card d-flex mb-3 justify-content-between" style="min-width:290px; max-width:290px"> 
                    <div style="flex-basis: 150px; overflow:hidden">
                        <img class="card-img-top " src="./images/<?php echo $course['Image'] ?>" alt="Card image cap" >
                    </div> 
                    <div class="card-body flex-grow-0">
                        <h5 class="card-title"><?php echo $course['Title'] ?></h5>
                        <p class="card-text"><?php echo $course['Description'] ?></p>
                        <p class="card-text"><?php echo $course['Price'] ?>DHS</p>
                        <div class="dropdown d-flex justify-content-between">
                        <a href="#" class="btn btn-primary">Buy</a>
                        <a href="" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-three-dots-vertical"></i></a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="editCourse.php?edit=<?php echo $course['id']; ?>">Edit</a></li>
                            <li><a class="dropdown-item" href="deleteCourse.php?delete=<?php echo $course['id']; ?>">Delete</a></li>
                        </ul>
                        </div>
                        </div>
                    </div>
                    <?php } ?>       
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