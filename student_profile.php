<?php

  session_start();

  if(!isset($_SESSION['username'])){
    header("location:login.php");
}

 elseif($_SESSION['usertype']=='admin'){

    header("location:login.php");
 }

   $host="localhost";
   $user="root";
   $pass="admin123";
   $db="collegeproject";

  $data=mysqli_connect($host,$user,$pass,$db);

  $name=$_SESSION['username'];

  $sql="SELECT * FROM user WHERE username='$name'";

  $result=mysqli_query($data,$sql);

  $info=mysqli_fetch_assoc($result);


  if(isset($_POST['update_profile']))
  {
      $email=$_POST['email'];
      $phone=$_POST['phone'];
      $password=$_POST['password'];

      $sql1="UPDATE user SET email='$email',phone='$phone',password='$password' 
      WHERE username='$name'";

      $result1=mysqli_query($data,$sql1);

      if($result1)
      {
         
         header("location:studenthome.php");
      }
      
     



  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile</title>
      <?php
         include("admin_css.php");
      ?>
</head>
<body>

    <?php include("student_sidebar.php"); ?>


    <div class="content">
        <h3>Update Profile</h3>
        
        <div class="container">
<div class="row">
<div class="col-md-8">

    <form method="POST">
  
  <div class="mb-3">
    <label for="phone" class="form-label">Email</label>
    <input type="text" class="form-control" name="email" value="<?php echo "{$info['email']}"; ?>">
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Phone</label>
    <input type="text" class="form-control" name="phone" value="<?php echo "{$info['phone']}"; ?>">
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Password</label>
    <input type="text" class="form-control" name="password" value="<?php echo "{$info['password']}"; ?>">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" >
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-success" name="update_profile"> 

  <?php  echo "<a onClick=\"javascript: return confirm('Are You sure to Update!'); \"  href''> UPDATE  </a>" ?>

  </button>
</form>

</div>
</div>
</div>
        
        
    </div>
    

    
</body>
</html>