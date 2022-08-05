<?php
 error_reporting(0);
  session_start();

  if(!isset($_SESSION['username'])){
      header("location:login.php");
  }
  
   elseif($_SESSION['usertype']=='student'){

      header("location:login.php");
   }

   $host ="localhost";
   $user="root";
   $pass="admin123";
   $db="collegeproject";


   $data=mysqli_connect($host,$user, $pass,$db);

   
   $sql1="SELECT * FROM course";

   $result=mysqli_query($data,$sql1);



//    Delete course Data
   if($_GET['delete'])
   {
       $del=$_GET['delete'];
       
       $sql2="DELETE FROM course where id='$del'";

       $result=mysqli_query($data,$sql2);


       if($result)
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
    <title>view course</title>

        <?php
             include("admin_css.php");
        ?>

  
</head>
<body>

    <?php 

      include("admin_sidebar.php");

    ?>


    
    
    


    <div class="content">
        <h3>view Course</h3>

        <table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Course Name</th>
      <th scope="col">course Description</th>
      <th scope="col">Course Image</th>
       <th scope="col">DELETE</th>
      <th scope="col">UPDATE</th> 
     
     
    </tr>
  </thead>
  <tbody>
    <?php  
      while($info=$result->fetch_assoc()){
    
    ?>
    <tr>
      <th scope="row"> <?php echo "{$info['id']}"; ?> </th>
      <td> <?php echo "{$info['name']}"; ?> </td>
      <td> <?php echo "{$info['description']}"; ?></td>
      <td> <img width="50px" src="<?php echo "{$info['image']}"; ?>" alt=""> </td>
      <td> <?php  echo "<a onClick=\"javascript: return confirm('Are you sure to delete this '); \" href='view_course.php?delete={$info[id]}' class='btn btn-danger'> DELETE </a>"; ?>  </td>
      <td> <?php echo "<a href='update_course.php?update={$info['id']}' class='btn btn-primary'> UPDATE </a>"; ?> </td>
    </tr>
     <?php  }?>
  </tbody>
</table>
        <br>
    
    </div>
    

    
</body>
</html>