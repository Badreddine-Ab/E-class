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
        <title>Dashbord Students</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
        <!-- Core theme CSS (includes Bootstrap)-->
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/index.css">
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
                    include_once 'NavBar.php'
                ?>
                
                <!-- Page content-->
                <div class="bg-light navbar-light ">
                  <nav class="navbar navbar-expand-lg pt-3">
                    <div class="container-fluid">
                        <h1 class="fs-2 ps-3">Students List</h1>
                        <form class="d-flex pe-3">
                          <i class="bi bi-arrows-expand fs-5 me-3"></i>
                          <a href="create.php" class="btn btn-outline-success ps-5 pe-5 bg-info text-light border-0">ADD NEW STUDENT</a>
                        </form>
                    </div>
                </nav>

                <div class="container-fluid table-responsive">

                <table class="table  table-borderless">
                  <thead >
                    <tr class="text-secondary">
                      <th scope="col"></th>
                      <th scope="col">Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Phone</th>
                      <th scope="col">Enroll Number</th>
                      <th scope="col">Date of admission</th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
                      <tbody>
                    <?php $results = mysqli_query($conn, "SELECT * FROM `students`"); 
                    while($Students = mysqli_fetch_array($results)) {?>
                        <tr class=" bg-white  mb-3 align-middle border-5 border-light ">
                            <td style="flex-basis: 50px; overflow:hidden"><img style="max-width: 50px " src="images/<?php echo $Students['image'] ?>" alt="user pic"></td>
                            <td><?php echo $Students['name'] ?></td>
                            <td><?php echo $Students['email'] ?></td>
                            <td><?php echo $Students['phone'] ?></td>
                            <td><?php echo $Students['EnrollNumber'] ?></td>
                            <td><?php echo $Students['reg_date'] ?></td>
                            <td><?php ?></td>
                            <td class="d-flex fs-4 text-info border-0 text-end">
                            <a href="edit.php?edit=<?php echo $Students['ID']; ?>" class="edit_btn" ><i class="bi bi-pen-fill text-info fs-3 me-3"></i></a>
                            <a href="delete.php?delete=<?php echo $Students['ID']; ?>" class="del_btn"><i class="bi bi-archive-fill text-info fs-3 me-3"></i></a>
                            </td>
                        </tr>
                      <?php } ?>
                  </tbody>
                </table>
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
