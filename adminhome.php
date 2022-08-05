<?php
 error_reporting(0);
  session_start();

  if(!isset($_SESSION['username'])){
      header("location:login.php");
  }
  
   elseif($_SESSION['usertype']=='student'){

      header("location:login.php");
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


    <!-- <header class="header"> 

        <a href="#">Admin Dashboard</a>
        <div class="log-out">
        <a href="logout.php" class="btn btn-primary">Logout</a>
        </div>
    </header> -->

    
    <!-- <aside>
        <ul>
            <li>
                <a href="admission.php">Admission</a>
            </li>

            <li>
                <a href="">Add student</a>
            </li>

            <li>
                <a href="">View Student</a>
            </li>

            <li>
                <a href="">Add Teacher</a>
            </li>

            <li>
                <a href="">View Teacher</a>
            </li>

            <li>
                <a href="">Add courses</a>
            </li>

            <li>
                <a href="">View Courses</a>
            </li>
        </ul>
    </aside> -->


    <div class="content">
        <h1>Admin Dashboard</h1>
    
    </div>
    

    
</body>
</html>