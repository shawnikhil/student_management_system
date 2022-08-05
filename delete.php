<?php

   error_reporting(0);
   session_start();
  $host="localhost";
  $user="root";
  $pass="admin123";
  $db="collegeproject";

  $data=mysqli_connect($host,$user,$pass,$db);

  if($data===false)
  {
      echo "Connection error";
  }

   if($_GET['student_id']){
       
      $user_id=$_GET['student_id'];
      
      $sql="DELETE FROM user WHERE id='$user_id'";

      $result=mysqli_query($data,$sql);

      if($result)
      {
          $_SESSION['message']='<b> Delete Student Data is Successfully </b>';
          header("location:view_student.php");
      }
      
   }

?>