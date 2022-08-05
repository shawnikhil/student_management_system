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

    if($data===false){
        die("connection error");
    }
     
    $sql="SELECT * FROM user WHERE usertype='student'";

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
        <h3>View Student</h3>

        <?php
           if($_SESSION['message']){
               echo $_SESSION['message'];
           }
           unset($_SESSION['message']);
        ?>
    
 <table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">User Name</th>
      <th scope="col">Phone</th>
      <th scope="col">email</th>
      <th scope="col">Usertype</th>
      <th scope="col">Password</th>
      <th scope="col">DELETE</th>
      <th scope="col">UPDATE</th>
    </tr>
  </thead>
  <tbody>
      <?php
         while($info=$result->fetch_assoc()){

      ?>
    <tr>
      <th scope="row"><?php echo "{$info['id']}"; ?></th>
      <td> <?php echo "{$info['username']}"; ?></td>
      <td>  <?php echo "{$info['phone']}";  ?></td>
      <td>  <?php echo "{$info['email']}"; ?></td>
      <td>  <?php echo "{$info['usertype']}"; ?></td>
      <td> <?php echo "{$info['password']}"; ?></td>

        <!-- this td for delete data -->
      <td> <?php echo "<a onClick=\"javascript: return confirm('Are You sure to delete!'); \" href='delete.php?student_id={$info['id']}' class='btn btn-danger'>   DELETE <a>" ?>  </td>

      <!-- this td for updata data -->
     <td>  <?php echo "<a  href='update_student.php?update={$info['id']}' class='btn btn-primary'> UPDATE  </a>"; ?>  </td>
    </tr>
    <?php }?>
  </tbody>
</table>
    </div>
    

    
</body>
</html>