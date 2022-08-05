<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="css/style.css"/>
</head>
<body background="images/school2.jpg" class="body_deg">

    <center>
        <div class="form_deg">
             <center class="title_deg">
                 Login Form

                 <h5 class="text-danger">
                     <?php
                         error_reporting(0);
                         session_start();
                         session_destroy();
                        echo $_SESSION['loginMessage'];
                     ?>
                 </h5>
             </center>
            <form action="login_check.php" method="POST" class="login_form">
                <div>
                    <label class="label_deg">UserName</label>
                    <input type="text" name="username">
                </div>

                <div>
                    <label class="label_deg">Password</label>
                    <input type="password" name="password">
                </div>

                <div>
                   
                    <input type="submit" name="submit" value="Login" class="btn btn-success">
                </div>
            </form>
        </div>
    </center>
</body>
</html>