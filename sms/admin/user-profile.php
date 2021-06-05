<H1 class="text-primary"><i class="fa fa-user"></i> User Profile <small>My Profile</small></H1>
<ol class="breadcrumb">
    <li><a href="index.php?page=dashboard">Dashboard</a></li>
    <li class="active">Profile</li>
</ol>

<?php
require_once 'dbcon.php';

$sesson_user = $_SESSION['user_login'];
$user_data = mysqli_query($db, "SELECT * FROM users WHERE username = '$sesson_user'");
$user_row = mysqli_fetch_assoc($user_data);
?>


<div class="row">
    <div class="col-sm-6">
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="table table-borderd table-hover">
                <tr>
                    <td>User Id</td>
                    <td><?= $user_row['id'];?></td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td><?= ucwords($user_row['name']);?></td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td><?= $user_row['username'];?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?= $user_row['email'];?></td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td><?= ucwords($user_row['status']);?></td>
                </tr>
                <tr>
                    <td>Sign Up Date</td>
                    <td><?= $user_row['datetime'];?></td>
                </tr>
            </table>
        </form>
        <a href="" class="btn btn-sm btn-info pull-right">Edit Profile</a>
    </div>
    <div class="col-sm-6">
        <a href="">
            <img src="img/<?= $user_row['photo'];?>" width="200px">
        </a>
        <br><br>
        <?php
        if (isset($_POST['upload'])) {
            $photo      = explode('.',$_FILES['photo']['name']);
            $tmp_name   = $_FILES['photo']['tmp_name'];
        
            $photo_end = strtolower(end($photo));
            $random = rand();
            $photo_name = $sesson_user.'_'.date('Y-M').'.'.$photo_end;
            $photo_ext = array("jpg","jpeg","png");
            if (in_array($photo_end, $photo_ext)) {
                mysqli_query($db, "UPDATE users SET photo=$photo_name WHERE username='$sesson_user'");
                move_uploaded_file($tmp_name, 'img/'.$photo_name);
            }

        }
        ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="photo">Profile Picture</label>
            <input type="file" id="photo" name="photo"> <br>
            <input type="submit" value="Upload" name="upload" class="btn btn-info btn-sm">
        </form>
    </div>
</div>