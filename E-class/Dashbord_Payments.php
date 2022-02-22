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
        <title>Dashbord Payments</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
        <!-- Core theme CSS (includes Bootstrap)-->
        <link rel="stylesheet" href="css/bootstrap.css">
    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
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
                <div class="bg-light navbar-light ">
                  <nav class="navbar navbar-expand-lg pt-3">
                    <div class="container-fluid">
                        <h1 class="fs-3 ps-3">Payments Details</h1>
                        <form class="d-flex pe-3">
                          <i class="bi bi-arrows-expand fs-5 me-3"></i>
                          <a href="create_payment.php" class="btn btn-outline-success ps-5 pe-5 bg-info text-light border-0">ADD A NEW PAYMENT</a>
                        </form>
                    </div>
                </nav>

                <div class="container-fluid table-responsive">

                  <table class="table table-borderless">
                    <thead >
                      <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Payment Schedule</th>
                        <th scope="col">Bill Number</th>
                        <th scope="col">Amount Paid</th>
                        <th scope="col">Balance amount</th>
                        <th scope="col">Date</th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $results = mysqli_query($conn, "SELECT * FROM `payment_details`"); 
                    while($payment = mysqli_fetch_array($results)) {?>
                      <tr class=" bg-white  mb-3 align-middle border-5 border-light ">
                        <td><?php echo $payment['name'] ?></td>
                        <td><?php echo $payment['Payment_Schedule'] ?></td>
                        <td><?php echo $payment['Bill_Number'] ?></td>
                        <td><?php echo $payment['Amount_Paid'] ?></td>
                        <td><?php echo $payment['Balance_amount'] ?></td>
                        <td><?php echo $payment['Date'] ?></td>
                        
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
