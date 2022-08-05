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
     
     $sql="SELECT * FROM user WHERE id='$update'";

     $result=mysqli_query($data,$sql);

     $info=$result->fetch_assoc();


     //Update data 
     if(isset($_POST['update'])){
         
        $name=$_POST['name'];
        $phone=$_POST['phone'];
        $email=$_POST['email'];
        $password=$_POST['password'];
      
        $query="UPDATE user SET username='$name',phone='$phone',email='$email',	password='$password'
        WHERE id='$update'";

        $result2=mysqli_query($data,$query);

        if($result){
            header("location:view_student.php");
        }



     }
     
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update student page</title>

        <?php
             include("admin_css.php");
        ?>

  
</head>
<body>

    <?php 

      include("admin_sidebar.php");

    ?>


    

    
   

    <div class="content">
        <h1>Update student Data</h1>
        
        <br> 

    <div class="container">
<div class="row">
<div class="col-md-8">

    <form method="POST">
  <div class="mb-3">
    <label for="name" class="form-label">User Name</label>
    <input type="text" class="form-control" name="name" value="<?php echo "{$info['username']}"; ?>">
    
  </div>
  <div class="mb-3">
    <label for="phone" class="form-label">Phone</label>
    <input type="text" class="form-control" name="phone" value="<?php echo "{$info['phone']}"; ?>">
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="text" class="form-control" name="email" value="<?php echo "{$info['email']}"; ?>">
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Password</label>
    <input type="text" class="form-control" name="password" value="<?php echo "{$info['password']}"; ?>">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" >
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary" name="update">Update</button>
</form>

</div>
</div>
</div>

    
    </div>
    

    
</body>
</html>