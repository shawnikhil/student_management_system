<?php
  error_reporting(0);
  session_start();
  session_destroy();

   if($_SESSION['message']){

       $message=$_SESSION['message'];

       echo "<script type='text/javascript'>  
       
         alert('$message');
       
       </script>";
   }

   $host="localhost";
   $user="root";
   $pass="admin123";
   $db="collegeproject";

   $data=mysqli_connect($host,$user,$pass,$db);


   $sql="SELECT * FROM teacher";

   $result=mysqli_query($data,$sql);


   $sql2="SELECT * FROM course";


$result1=mysqli_query($data,$sql2);
     
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link rel="stylesheet" href="css/style.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"/>

</head>
<body>
    <nav>
        <label class="logo">My-School</label>

        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="#">Admission</a></li>
            <li><a href="login.php" class="btn btn-success">Login</a></li>
        </ul>
    </nav>

    <div class="section1">
        <label class="img_text"> We Teach Student With Care</label>
        <img src="images/school_management.jpg" alt="" class="main_img" >
    </div>

    <div class="container">
         
        <div class="row">
            <div class="col-md-4">
                <img src="images/school2.jpg" class="welcome_img">
            </div>

            <div class="col-md-8">
                 <h2 class="text-center">Welcme to My-School</h2>
                 <p class="para">
                     Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eius, quaerat voluptates. Blanditiis ullam corrupti hic consequuntur qui facilis odit perspiciatis doloremque repudiandae, explicabo rem laudantium obcaecati magni delectus laborum ipsam numquam. In, nisi ipsum perferendis saepe quis vitae nihil tempore, dolor a corporis dignissimos blanditiis, eligendi cum. Tempore alias incidunt deleniti quaerat hic. Dignissimos eveniet nihil ipsum consectetur delectus est magnam odio asperiores exercitationem ea rerum voluptates excepturi ad, enim maiores, itaque adipisci quasi quas mollitia. Quod exercitationem praesentium labore obcaecati, ab assumenda beatae tempore molestias, aliquid porro necessitatibus vel non repellendus ea illum eum excepturi ad iusto illo ullam a 
                     voluptates excepturi ad, enim maiores, itaque adipisci quasi quas mollitia. Quod    
                 </p>
            </div>
        </div>

    </div>

     <center>
         <h2 class="pt-5">Our Teachers</h2>
     </center>

      <div class="container">
          <div class="row">
               
              <?php  
                  while($info=$result->fetch_assoc()){

                  
              ?>
              <div class="col-md-4">
                  <img src="<?php echo "{$info['image']}"; ?>" class="teacher" >
                    <h4 class="text-center"> <?php echo "{$info['name']}"; ?> </h4>
                    <h6 class="text-center"> <?php echo "{$info['description']}"; ?> </h6>
              </div>
              <?php } ?>
             

          </div>
      </div>






      <center>
        <h2 class="pt-5">Our Courses</h2>
    </center>

     <div class="container">
         <div class="row">
             <?php
               while($info=$result1->fetch_assoc()) {
             ?>
             <div class="col-md-4">
                 <img src="<?php echo "{$info['image']}"; ?>" class="teacher">
                  <h4 class="text-center"> <?php echo "{$info['name']}"; ?></h4>

                  <h6 class="text-center"><?php echo "{$info['description']}";  ?></h6>
             </div>
          <?php  }?>
              

         </div>
     </div>


      <center>
          <h1 class="adm">Admission Form</h1>
      </center>

      <div align="center" class="admission_form">
          <form action="data_check.php"  method="POST">
              <div class="adm_int">
                  <label class="label_text">Name</label>
                  <input type="text" name="name" class="input_deg">
              </div>

            

            <div class="adm_int">
                <label  class="label_text">Email</label>
                <input type="text" name="email"class="input_deg">
            </div>

            <div class="adm_int">
                <label  class="label_text">Phone</label>
                <input type="text" name="phone" class="input_deg">
            </div>

            <div class="adm_int">
                <label  class="label_text">Message</label>
                  <textarea name="message" class="input_text"></textarea>
            </div>

            <div class="adm-int">
               
                 <input type="submit" name="apply" class="btn btn-primary" value="apply" id="submit">
            </div>
          </form>
      </div>
   

       <footer>
           <h3 class="footer_text">All @copyright reserved by web tech knowledge</h3>
       </footer>








    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>