<?php

require_once 'dbcon.php';
session_start();

if (isset($_POST['registration'])) {
    $name       = $_POST['name'];
    $email      = $_POST['email'];
    $username   = $_POST['username'];
    $password   = $_POST['password'];
    $c_password = $_POST['c_password'];

    $photo      = explode('.',$_FILES['photo']['name']);
    $tmp_name   = $_FILES['photo']['tmp_name'];

    $photo_end = strtolower(end($photo));
    $random = rand();
    $photo_name = $username.'_'.date('Y-M').'.'.$photo_end;
    $photo_ext = array("jpg","jpeg","png");
    $input_error = array();

    if (empty($name)) {
        $input_error['name'] = "The Name field is required";
    }
    if (empty($email)) {
        $input_error['email'] = "The Email field is required";
    }
    if (empty($username)) {
        $input_error['username'] = "The Username field is required";
    }
    if (empty($password)) {
        $input_error['password'] = "The Password field is required";
    }
    if (empty($c_password)) {
        $input_error['c_password'] = "The Confirm Password field is required";
    }
    if (count($input_error) == 0) {
        $email_check = mysqli_query($db, "SELECT * FROM users WHERE email = '$email'");
        if (mysqli_num_rows($email_check) == 0) {
            $username_check = mysqli_query($db, "SELECT * FROM users WHERE username = '$username'");
            if (mysqli_num_rows($username_check) == 0) {
                if (strlen($username) > 3) {
                    if (strlen($password) > 5) {
                        if ($password == $c_password) {
                            if (in_array($photo_end, $photo_ext)) {
                                $password = sha1($password);

                                $query = "INSERT INTO users (name,email,username,password,photo,status) VALUES ('$name','$email','$username','$password','$photo_name','inactive')";
                                $result = mysqli_query($db, $query);

                                if ($result) {
                                    $_SESSION['data_insert_success'] = "Data Insert Success!";
                                    move_uploaded_file($tmp_name, 'img/'.$photo_name);
                                    header('location: registration.php');
                                }else {
                                    $_SESSION['data_insert_error'] = "Data Insert Error!";
                                }
                            }else {
                                $photo_ext_error = "Please attach an image";
                            }
                        }else {
                            $c_password_error = "Confirm password not match!";
                        }
                    }else {
                        $password_l = "Password should be more than 5 characters";
                    }
                }else {
                    $username_l = "Username should be more than 4 characters";
                }
            }else {
                $username_error = "This username already exists!";
            }
        }else {
            $email_error = "This email already exists!";
        }
    }
        
}

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Students Management System</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    
        <div class="container">
            <h1>User Registration Form</h1>
            <?php if (isset($_SESSION['data_insert_success'])) {
                echo '<div class="alert alert-success col-sm-4">'.$_SESSION['data_insert_success'].'</div>';}?>
            <?php if (isset($_SESSION['data_insert_error'])) {
                echo '<div class="alert alert-warning col-sm-4">'.$_SESSION['data_insert_error'].'</div>';}?>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
                        <div class="form-group">
                            <label for="name" class="form-label col-sm-1">Name</label>
                            <div class="col-sm-4">
                                <input type="text" id="name" name="name" placeholder="Enter Your Name" class="form-control" value="<?php if(isset($name)){ echo $name;}?>">
                            </div>
                            <label class="error">
                                <?php if (isset($input_error['name'])) { echo $input_error['name']; } ?>
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="email" class="form-label col-sm-1">Email</label>
                            <div class="col-sm-4">
                                <input type="email" id="email" name="email" placeholder="Enter Your Email" class="form-control" value="<?php if(isset($email)){ echo $email;}?>">
                            </div>
                            <label class="error">
                                <?php if (isset($input_error['email'])) { echo $input_error['email']; } ?>
                            </label>
                            <label class="error">
                                <?php if (isset($email_error)) { echo $email_error; } ?>
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="username" class="form-label col-sm-1">Username</label>
                            <div class="col-sm-4">
                                <input type="text" id="username" name="username" placeholder="Enter Your Username" class="form-control" value="<?php if(isset($username)){ echo $username;}?>">
                            </div>
                            <label class="error">
                                <?php if (isset($input_error['username'])) { echo $input_error['username']; } ?>
                            </label>
                            <label class="error">
                                <?php if (isset($username_error)) { echo $username_error; } ?>
                            </label>
                            <label class="error">
                                <?php if (isset($username_l)) { echo $username_l; } ?>
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="password" class="form-label col-sm-1">Password</label>
                            <div class="col-sm-4">
                                <input type="password" id="password" name="password" placeholder="Enter Your Password" class="form-control" value="<?php if(isset($password)){ echo $password;}?>">
                            </div>
                            <label class="error">
                                <?php if (isset($input_error['password'])) { echo $input_error['password']; } ?>
                            </label>
                            <label class="error">
                                <?php if (isset($password_l)) { echo $password_l; } ?>
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="c_password" class="form-label col-sm-1">Confirm Password</label>
                            <div class="col-sm-4">
                                <input type="password" id="c_password" name="c_password" placeholder="Confirm Password" class="form-control" value="<?php if(isset($c_password)){ echo $c_password;}?>">
                            </div>
                            <label class="error">
                                <?php if (isset($input_error['c_password'])) { echo $input_error['c_password']; } ?>
                            </label>
                            <label class="error">
                                <?php if (isset($c_password_error)) { echo $c_password_error; } ?>
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="photo" class="form-label col-sm-1">Photo</label>
                            <div class="col-sm-4">
                                <input type="file" id="photo" name="photo">
                            </div>
                            <label class="error">
                                <?php if (isset($photo_ext_error)) { echo $photo_ext_error; } ?>
                            </label>
                        </div>
                        <div class="col-sm-4 col-sm-offset-1">
                            <input type="submit" value="Registration" name="registration" class="btn btn-primary">
                        </div>
                    </form>
                    <br><br><br>
                    <p>If you hava an account, then please <a href="login.php">login</a>.</p>
                    <hr>
                    <footer>
                        <p>Copyright &copy; 2016 - <?= date('Y');?> All rights reserved.</p>
                    </footer>
                </div>
            </div>
        </div>

    </body>
</html>