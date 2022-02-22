<!-- Sidebar-->
<?php
  
?>

<div class="Sidebar bg-yellow" id="sidebar-wrapper">
              <div class="sidebar-heading pt-3">
              <div class="border-start border-info border-5 col-12 mb-3 ms-3">
                <h1 class="ms-2">E-classe</h1>
              </div>
              <div class="mt-3 d-flex justify-content-center align-items-center flex-column">
                  <img class="rounded-circle " src="./images/youcode.png" alt="youcode">
                  <div class="d-flex justify-content-center align-items-center flex-column mt-3">
                      <p class="fw-bold fs-4"><?php echo $_SESSION['auth']['name']?> </p>
                      <p class="fs-5 text-info"><?php echo $_SESSION['auth']['role']?></p>
                  </div>
              </div>
              </div>
              
              <div class="list-group list-group-flush">
                  <div class="pt-1 me-4 d-flex justify-content-center">
                      <a href="Dashbord_Admin.php" class="fs-5 text-center text-decoration-none text-dark d-flex align-items-center">
                          <i class="bi bi-house-door fs-4 me-3"></i>
                          Home</a>
                    </div>
                    
                    <div class="mt-3 d-flex justify-content-center">
                      <a href="Dashbord_Courses.php" class="fs-5 text-center me-3 text-decoration-none text-dark ">
                          <i class="bi bi-bookmark fs-4 me-3"></i> 
                          Course</a>
                    </div>
                    
                    <div class="mt-3 d-flex justify-content-center">
                      <a href="Dashbord_Student.php" class="fs-5 text-center  text-decoration-none text-dark ">
                          <i class="bi bi-mortarboard fs-4 me-3"></i>
                          Students</a>
                    </div>
                    
                    <div class="mt-3 d-flex justify-content-center">
                      <a href="Dashbord_Payments.php" class="fs-5 text-center me-1 text-decoration-none text-dark">
                          <i class="bi bi-coin fs-4 me-3"></i>
                          Payment</a>
                    </div>
                    
                    <div class="mt-3 d-flex justify-content-center">
                      <a href="" class="fs-5 text-center me-3 text-decoration-none text-dark ">
                          <i class="bi bi-clipboard-data fs-4 me-3"></i>
                          Report</a>
                    </div>
                    
                    <div class="mt-3 d-flex justify-content-center">
                      <a href="" class="fs-5 text-center me-2 text-decoration-none text-dark ">
                          <i class="bi bi-gear fs-4 me-3"></i>
                          Settings</a>
                    </div>
                   
                  </div>
                  <div class="mt-3 bottom d-flex justify-content-center align-items-center">
                    <a href="logout.php" class="fs-5 text-center text-decoration-none text-dark mt-4 ">Logout
                      <i class="bi bi-box-arrow-right "></i>
                    </a>
                  </div>
          </div>