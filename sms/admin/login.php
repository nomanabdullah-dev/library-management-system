<?php
require_once 'dbcon.php';
session_start();
if (isset($_SESSION['user_login'])) {
    header('location: index.php');
}

if (isset($_POST['login'])) {
    $username   = $_POST['username'];
    $password   = $_POST['password'];

    $username_check = mysqli_query($db, "SELECT * FROM users WHERE username = '$username'");
    if (mysqli_num_rows($username_check) > 0 ) {
        $row = mysqli_fetch_assoc($username_check);
        if ($row['password'] == sha1($password)) {
            if ($row['status'] == 'active') {
                $_SESSION['user_login'] = $username;
                header('location: index.php');
            }else {
                $status_inactive = "Your status is inactive, please contact with the authority.";
            }
        }else {
            $wrong_password = "Password doesnt match!";
        }
    }else {
        $user_not_match = "Username not found!";
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

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body style="background:#f5f5f5">
    
    <div class="container">    
        <br><br>
        <h1 class="text-center">Welcome to Students Management System</h1>
        <div class="row">
            <h2 class="text-center">Admin Login Form</h2>
            <div class="col-sm-4 col-sm-offset-4">
                <form action="" method="POST">
                    <div>
                        <input type="text" placeholder="Username" name="username" required="required" class="form-control" value="<?php if(isset($username)){ echo $username;}?>">
                    </div>
                    <br>
                    <div>
                        <input type="password" placeholder="password" name="password" required="required" class="form-control" value="<?php if(isset($password)){ echo $password;}?>">
                    </div>
                    <br>
                    <div>
                        <input type="submit" value="Login" name="login" class="btn btn-primary pull-right">
                        <a href="../index.php" class="btn btn-sm btn-default pull-left">Back</a>
                    </div>
                </form>
            </div>
        </div>
        <br>
        <?php
        if (isset($user_not_match)) {
            echo '<div class="alert alert-danger col-sm-4 col-sm-offset-4">'.$user_not_match.'</div>';
        } ?>
        <?php
        if (isset($wrong_password)) {
            echo '<div class="alert alert-danger col-sm-4 col-sm-offset-4">'.$wrong_password.'</div>';
        } ?>
        <?php
        if (isset($status_inactive)) {
            echo '<div class="alert alert-danger col-sm-4 col-sm-offset-4">'.$status_inactive.'</div>';
        } ?>
    </div>

    </body>
</html>