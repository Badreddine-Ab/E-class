<?php
 
  require_once 'connect_db.php';

  if(isset($_POST['save'])){
		$name = $_POST['name'];
		$Payment_Schedule = $_POST['Payment_Schedule'];
		$Bill_Number = $_POST['Bill_Number'];
		$Amount_Paid = $_POST['Amount_Paid'];
		$Balance_amount = $_POST['Balance_amount'];


		$sql = "INSERT INTO `payment_details` (name,Payment_Schedule, Bill_Number, Amount_Paid,Balance_amount ) 
            VALUES ('$name', '$Payment_Schedule', '$Bill_Number', '$Amount_Paid', '$Balance_amount')"; 

    if(!mysqli_query($conn,$sql)){
        die('impossible d’ajouter cet enregistrement : ' . mysqli_error());
    }

		header('location: Dashbord_Payments.php');
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Add a new Payment</title>
</head>
<body>
  <div class="container w-50 pt-5" >
    <form method="POST" enctype="multipart/form-data">
    
      <div class="form-group mb-3">
        <label for="Name ">Name</label>
        <input type="name" class="form-control mt-2" id="name" name="name" placeholder="Enter a name" required>
      </div>

      <div class="form-group mb-3">
        <label for="description">Payment schedule</label>
        <input type="text" class="form-control mt-2" id="Payment_Schedule" name="Payment_Schedule" placeholder="Enter a payment schedule" required>
      </div>
      
      <div class="form-group mb-3">
        <label for="price">Bill Number</label>
        <input type="text" class="form-control mt-2" id="Bill_Number" name="Bill_Number" placeholder="Enter a bill number" required>
      </div>

      <div class="form-group mb-3">
        <label for="price">Amount Paid</label>
        <input type="text" class="form-control mt-2" id="Amount_Paid" name="Amount_Paid" placeholder="Enter an amount paid" required>
      </div>

      <div class="form-group mb-3">
        <label for="price">Balance amount</label>
        <input type="text" class="form-control mt-2" id="Balance_amount" name="Balance_amount" placeholder="Enter balance amount" required>
      </div>

      

      <button type="submit" class="btn btn-primary" name="save">Submit</button>
      <a href="Dashbord_Payments.php" class="btn btn-secondary ml-2">Cancel</a>
    </form>
  </div>
</body>
</html>