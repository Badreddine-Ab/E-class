<?php

  require_once 'connect_db.php';

  if(isset($_POST['save'])){
		$img = $_FILES['img']['name'];
		$title = $_POST['title'];
		$description = $_POST['description'];
		$price = $_POST['price'];

    if(!file_exists('./images/')) {
      mkdir("./images/");
    }

    move_uploaded_file($_FILES['img']['tmp_name'], "./images/".$img);

		$sql = "INSERT INTO `courses` (image, Title, Description, Price) 
            VALUES ('$img', '$title', '$description', '$price')"; 

    if(!mysqli_query($conn,$sql)){
        die('impossible d’ajouter cet enregistrement : ' . mysqli_error());
    }

		header('location: Dashbord_Courses.php');
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Add Course</title>
</head>
<body>
  <div class="container w-50 pt-5" >
    <form method="POST" enctype="multipart/form-data">
      <div class="form-group mb-3">
        <label for="formFile" class="form-label"></label>
        <input class="form-control shadow-none" type="file" name="img" id="img">
      </div>

      <div class="form-group mb-3">
        <label for="Name ">Title</label>
        <input type="name" class="form-control mt-2" id="name" name="title" placeholder="Enter Title Course" required>
      </div>

      <div class="form-group mb-3">
        <label for="description">Description</label>
        <input type="text" class="form-control mt-2" id="description" name="description" placeholder="Enter Descritpion" required>
      </div>
      
      <div class="form-group mb-3">
        <label for="price">Price</label>
        <input type="text" class="form-control mt-2" id="price" name="price" placeholder="Enter Price" required>
      </div>

      <button type="submit" class="btn btn-primary" name="save">Submit</button>
      <a href="Dashbord_Courses.php" class="btn btn-secondary ml-2">Cancel</a>
    </form>
  </div>
</body>
</html>