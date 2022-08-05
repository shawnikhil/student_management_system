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

   $data = mysqli_connect($host,$user,$pass,$db);
   
    if(isset($_POST['add_teacher']))
    {
        $name=$_POST['tname'];
        $desc=$_POST['desc'];

        $file=$_FILES['image']['name'];

        $dst="./image/".$file;

        $dst_db="image/".$file;

        move_uploaded_file($_FILES['image']['tmp_name'],$dst);

        $sql="INSERT INTO teacher(name,description,image)
        VALUES ('$name','$desc','$dst_db')";


         $result=mysqli_query($data,$sql);


         if($result){
             header("location:add_teacher.php");
         }


    }
      
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Teacher</title>

        <?php
             include("admin_css.php");
        ?>

  
</head>
<body>

    <?php 

      include("admin_sidebar.php");

    ?>


   

    
   


    <div class="content">
    <h3>Add Teachers</h3>
     <br>
 <div class="container">
    <div class="row">
    <div class="col-md-8">

    <form method="POST" enctype="multipart/form-data">
     <div class="mb-3">
    <label for="name" class="form-label">Teacher Name</label>
    <input type="text" class="form-control" name="tname">
    
     </div>

    <div class="mb-3">
    <label for="desc" class="form-label"> Teacher Description</label>
    
     <textarea class="form-control" placeholder="Description here" name="desc"></textarea>
 
    </div>

  <div class="mb-3">
    <label for="image" class="form-label">Image</label>
    <input type="file" class="form-control" name="image">
  </div>

  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" >
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>

  <button type="submit" class="btn btn-primary" name="add_teacher">Add Teacher</button>
</form>
                
</div>
            
</div>
        
</div>
    
</div>
    

    
</body>
</html>