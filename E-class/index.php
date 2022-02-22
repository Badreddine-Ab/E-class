<?php
  session_start();
  require_once('./library/library.php');
  if(isLoged()){
    redirect ('Dashbord_Admin');
    die();
  }
  require_once 'connect_db.php';
$email = $logerror = $password = '';
  $errors =[
    'email' => '',
    'password' => ''
  ];
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $check = $_POST['check'] ?? "";

  if($check == 'on'){
    setcookie('email', $_POST['email'], time() + 60 * 60 * 24 );
    setcookie('password', $_POST['password'], time() +  60 * 60 * 24 );
  }else{
    setcookie('email');
    setcookie('password');
  }
}

  if(isset($_POST['signin'])){

  if(empty($_POST['email'])){
    $errors['email'] = "an email is required";  
  } else {
   $email = $_POST['email'];
   if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $errors['email']='email must be a valid email adress' ;
   }
  }
  if(empty($_POST['password'])){
    $errors['password'] = "a password is required";
  } else {
    $password = $_POST['password'];
    // if(!preg_match('/^[a-zA-Z\s]+$/', $password)){
    //   $errors['password'] = 'Password must be letters and spaces only';
    // }
  }

  if(!array_filter($errors)){
    $sql="Select * from comptes where
    email='$email' and password='$password'";
    $result=mysqli_query($conn,$sql);
    $count=mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    if($count>0)
    {
        // echo "login successful";
        $_SESSION['auth'] = array(
          'email' => $email,
          'password' => $password,
          'role' => $row['role'],
          'name' => $row['name']

        );
        header('location:Dashbord_Admin.php');
    }
    else
    {
       $logerror = "loging not successful";
    }
  } 
  
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Sign In</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
        <!-- Core theme CSS (includes Bootstrap)-->
        <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body class="bg-body">
    <main >
        <div class="container-fluid">
          <div class="d-flex justify-content-center">
              <div class="col-md-4 shadow col-sm-12 p-4 bg-white mt-5" style="border-radius: 20px;">
                <div class="border-start border-info border-5 col-12 mb-3 ms-3">
                  <h1 class="ms-2">E-classe</h1>
                </div>
                  <div class="text-center">
                      <h2 class="text-uppercase h4 mt-4">Sign In</h2>
                      <p class="text-muted small">
                          Enter your credentials to access your account 
                      </p>
                    </div>
                    <form action ="" method ="post">
                      <div class="p-4">
                        <div class="mb-3">
                          <label for="email" class="form-label">Email</label>
                          <input type="text"  name= "email" class="form-control" placeholder="Enter your email" value="<?php echo htmlspecialchars($_COOKIE['email'] ?? "") ?>" >
                          <p class="text-danger"><?php echo $errors['email'];?></p>
                          
                          </div>
                          <div class="mb-3">
                              <label for="password" class="form-label">Password</label>
                              <input type="password" name ="password" class="form-control" placeholder="Enter your password" value="<?php echo htmlspecialchars( $_COOKIE['password'] ?? "") ?>">
                              <p class="text-danger"><?php echo $errors['password'];?></p>

                              <div class="form-check form-switch">
                                <input name="check" class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                                <label class="form-check-label" for="flexSwitchCheckChecked">Remember me</label>
                              </div>

                          </div>

                          <button  name="signin" class="btn bg-button text-white text-center mt-2 w-100 d-flex align-items-center justify-content-center" type="submit">
                              SIGN IN
                          </button>
                          <div class="d-flex justify-content-around mt-2">
                            <p class=" text-muted ">
                              Forgot your password?
                            </p>
                            <a class="bg-link" href="#">Reset password</a>
                          </div>
                          <div class="text-center">
                              <p class="small fw-bold ">Don't have an account? <a href="#!"
                              class="link-bg" >Register</a></p>
                          </div>
                          <div class="text-center">
                            <p class="text-danger"><?php echo $logerror;?></p>
                          </div>
                          
                      </div>
                  </form>
              </div>
          </div>
        </div>
    </main>
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
  </body>
  </html>