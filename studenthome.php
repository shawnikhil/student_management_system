<?php

  session_start();


  if(!isset($_SESSION['username'])){
    header("location:login.php");
}

 elseif($_SESSION['usertype']=='admin'){

    header("location:login.php");
 }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
      <?php
         include("admin_css.php");
      ?>
</head>
<body>

    <?php include("student_sidebar.php"); ?>


    <div class="content">
       
        <h1>Slider Accordian</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur, laborum dolor. Sequi nisi quia dolorem nam sit natus esse tempora, quas tempore rerum at illo in quasi culpa aut earum? Architecto possimus atque harum laborum.</p>
    </div>
    

    
</body>
</html>