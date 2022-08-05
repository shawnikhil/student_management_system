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
   $paas="admin123";
   $db="collegeproject";
 
   $data=mysqli_connect($host,$user,$paas,$db);
 
    $sql="SELECT * FROM  admission";

    $result=mysqli_query($data,$sql);
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
        <h3>Applied For Admission</h3>

        <table class="table table responsive">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Message</th>
    </tr>
  </thead>
  <tbody>
    
    <?php
       while($info=$result->fetch_assoc())
       {

       
    ?>
    
    <tr>
      <th scope="row"> <?php echo "{$info['id']}"; ?> </th>
      <th> <?php  echo "{$info['name']}";?></th>
      <th> <?php echo "{$info['emaila']}"; ?>  </th>
      <th> <?php echo "{$info['phone']}"; ?>  </th>
      <th> <?php echo "{$info['message']}"; ?> </th>
    </tr>

    <?php }?>
  </tbody>
</table>
    
    </div>
    

    
</body>
</html>