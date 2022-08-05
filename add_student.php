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

       if(isset($_POST['add_student'])){
             
           $user_name=$_POST['name'];
           $user_phone=$_POST['phone'];
           $user_email=$_POST['email'];
           $user_pass=$_POST['password'];
           $usertype="student";

           $check="SELECT * FROM user WHERE username='$user_name'";
           $check_user=mysqli_query($data,$check);
           
           $row_count=mysqli_num_rows($check_user);
           if($row_count==1){
               echo "<script type='text/javascript'> 
                    alert('User Name already exist try another one');
                </script>";
           }
          else{

          $sql="INSERT INTO user(username,phone,email,usertype,password)
           VALUES('$user_name','$user_phone','$user_email','$usertype','$user_pass')";

          $result=mysqli_query($data,$sql);

          if($result){
              
             echo "<script type='text/javascript'>
                 alert('data upload successfully');
             </script>";

          }
          else{
            echo "<script type='text/javascript'>
            alert('data not upload successfully');
        </script>";
          }
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
        <h3>Add Student</h3>
    

 <div class="container ">
<div class="row">
<div class="col-md-8">

    <form method="POST">
  <div class="mb-3">
    <label for="name" class="form-label">User Name</label>
    <input type="text" class="form-control" name="name">
    
  </div>
  <div class="mb-3">
    <label for="phone" class="form-label">Phone</label>
    <input type="text" class="form-control" name="phone">
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="text" class="form-control" name="email">
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Password</label>
    <input type="text" class="form-control" name="password">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" >
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary" name="add_student">Add Student</button>
</form>

</div>
</div>
</div>
        
</div>
    

    
</body>
</html>