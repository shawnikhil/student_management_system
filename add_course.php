<?php
 error_reporting(0);
  session_start();

  if(!isset($_SESSION['username'])){
      header("location:login.php");
  }
  
   elseif($_SESSION['usertype']=='student'){

      header("location:login.php");
   }

   $host="localhost";
   $user="root";
   $pass="admin123";
   $db="collegeproject";

   $data=mysqli_connect($host,$user,$pass,$db);
    
   if(isset($_POST['add_course']))
   {
      $name=$_POST['course_name'];
      $desc=$_POST['desc'];

     
      $file=$_FILES['image']['name'];

      $dst="./course_image/".$file;

      $dst_db="course_image/".$file;

      move_uploaded_file($_FILES['image']['tmp_name'],$dst);

      $sql="INSERT INTO course(name,description,image)
      VALUES('$name','$desc','$dst_db')";

      $result=mysqli_query($data,$sql);

      if($result){
          header("location:add_course.php");
      }

   }

  
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

        <?php
             include("admin_css.php");
        ?>

  
</head>
<body>

    <?php 

      include("admin_sidebar.php");

    ?>


    
    
    


    <div class="content">
        <h3>Add Course</h3>
           <br>
 <div class="container ">
<div class="row">

   <div class="col-8">
   <form method="POST" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="name" class="form-label">Course Name</label>
    <input type="text" class="form-control" name="course_name">
  </div>
  
  <div class="mb-3">
    <label for="name" class="form-label">Course Description</label>
    <textarea class="form-control" placeholder="Description here" name="desc"></textarea>
  </div>

  <div class="mb-3">
    <label for="name" class="form-label">Course Image</label>
    <input type="file" class="form-control" name="image">
  </div>

  <button type="submit" class="btn btn-primary" name="add_course">Add Course</button>
</form>

   </div>
   


</div>
</div>
        
    </div>
    

    
</body>
</html>