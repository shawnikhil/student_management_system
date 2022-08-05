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

     $update=$_GET['update'];
     
     $sql="SELECT * FROM course WHERE id='$update'";

     $result=mysqli_query($data,$sql);

     $info=$result->fetch_assoc();



     //Update course data
     if(isset($_POST['update_course']))
   {
      
      $c_name=$_POST['course_name'];

      $c_desc=$_POST['desc'];

      $file=$_FILES['image']['name'];

      $dst="./course_image/".$file;

      $dst_db="course_image/".$file;

      move_uploaded_file($_FILES['image']['tmp_name'],$dst);

    $sql2="UPDATE course SET  name='$c_name',description='$c_desc',image='$dst_db' WHERE id='$update'";
     
      if($file)
      {
        $sql2="UPDATE course SET  name='$c_name',description='$c_desc',image='$dst_db' WHERE id='$update'";
      }
      else{
        $sql2="UPDATE course SET  name='$c_name',description='$c_desc' WHERE id='$update'";
      }

      

      $result2=mysqli_query($data,$sql2);

      if($result2)
      {
          header("location:view_course.php");
      
      }

      
      
   }
     
     
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update course page</title>

        <?php
             include("admin_css.php");
        ?>

  
</head>
<body>

    <?php 

      include("admin_sidebar.php");

    ?>


    

    
   

    
<div class="content">
        <h3>Update course</h3>
           <br>
 <div class="container ">
<div class="row">

   <div class="col-8">
   <form method="POST" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="name" class="form-label">Course Name</label>
    <input type="text" class="form-control" name="course_name" value="<?php echo "{$info['name']}"; ?>">
  </div>
  
  <div class="mb-3">
    <label for="name" class="form-label">Course Description</label>
    <textarea class="form-control" placeholder="Description here" name="desc">
        <?php echo "{$info['description']}"; ?>
    </textarea>
  </div>

  
  <div class="mb-3">
    <label for="image" class="form-label">course old Image</label>
      <img width="100" src="<?php echo "{$info['image']}"; ?>">
  </div>

  <div class="mb-3">
    <label for="name" class="form-label">Course Image</label>
    <input type="file" class="form-control" name="image">
  </div>

  <button type="submit" class="btn btn-primary" name="update_course">Update Course</button>
</form>

   </div>
   


</div>
</div>
        
    </div>
    

    
</body>
</html>