<?php 
 
  require_once 'connect_db.php';
  $id = $_GET['edit'];
  $results = "SELECT * FROM `courses` WHERE id = $id";  
  $res = mysqli_query($conn, $results);
  while($row = mysqli_fetch_assoc($res)){
    $img = $row['Image'];
    $title = $row['Title'];
    $description = $row['Description'];
    $price = $row['Price'];
  }

			
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Create Students</title>
</head>
<body>
  <div class="container w-50 pt-5" >
    <form method="POST" enctype="multipart/form-data">
      <div class="form-group mb-3">
        <label for="formFile" class="form-label"></label>
        <input class="form-control shadow-none" type="file" name="img" id="img">
      </div>

      <div class="form-group mb-3">
        <label for="title ">Title</label>
        <input type="text" class="form-control mt-2" id="title" name="title"  value="<?php echo $title; ?>"  >
      </div>

      <div class="form-group mb-3">
        <label for="description">Description</label>
        <input type="text" class="form-control mt-2" id="description" name="description" value="<?php echo $description; ?>">
      </div>
      
      <div class="form-group mb-3">
        <label for="price">Price</label>
        <input type="text" class="form-control mt-2" id="price" name="price" value="<?php echo $price; ?>">
      </div>

      <button type="submit" class="btn btn-primary px-4" name="edit">Edit</button>
      <a href="Dashbord_Student.php" class="btn btn-secondary ml-2">Cancel</a>
    </form>
  </div>

  <?php
  
    if (isset($_POST['edit'])){
    $title = $_POST["title"] ;
    $price =$_POST["price"] ;
    $description =$_POST["description"];
    $img = $_FILES["img"]['name'];

    $id = $_GET['edit'];
    $results = "SELECT * FROM `courses` WHERE id = $id";  
    $res = mysqli_query($conn, $results);
    $data = mysqli_fetch_assoc($res);

      if($img) {
        move_uploaded_file($_FILES['img']['tmp_name'], "./images/".$img);
      } else {
        $img = $data['Image'];
      }
     $edite_courses ="UPDATE `courses` SET Image ='$img',
     Title ='$title', 
     Description ='$description',
     Price ='$price'
     where id = '$id'";
     mysqli_query($conn, $edite_courses);
 
         header('location: Dashbord_Courses.php');
       }
  ?>
</body>
</html>