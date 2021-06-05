<?php

require_once 'dbcon.php';

?>


<H1 class="text-primary"><i class="fa fa-user-plus"></i> Update Student <small>Update Student</small></H1>
<ol class="breadcrumb">
    <a href="index.php?page=dashboard">Dashboard</a>
    <li class="active"> <i class="fa fa-pencil"></i> Update Student</li>
</ol>

<?php
$id = base64_decode($_GET['id']);
$db_data = mysqli_query($db, "SELECT * FROM student_info WHERE id='$id'");
$db_row = mysqli_fetch_assoc($db_data);
?>

<?php
if (isset($_POST['update_student'])) {
    $name = $_POST['name'];
    $roll = $_POST['roll'];
    $class = $_POST['class'];
    $city = $_POST['city'];
    $pcontact = $_POST['pcontact'];
    
    $query1 = "UPDATE student_info SET name='$name', roll='$roll', class='$class', city='$city', pcontact='$pcontact' WHERE id='$id'";
    $result = mysqli_query($db, $query1);

    if ($result) {
        header('location: index.php?page=all-students');
    }

}
?>


<div class="row" style="margin-bottom:20px">
    <div class="col-sm-6">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Student Name</label>
                <input type="text" name="name" id="name" placeholder="Enter your name" class="form-control" required="required" value="<?= $db_row['name'];?>">
            </div>

            <div class="form-group">
                <label for="roll">Student Roll</label>
                <input type="text" name="roll" id="roll" placeholder="Enter your roll" class="form-control" pattern="[0-9]{6}" required="required" value="<?= $db_row['roll'];?>">
            </div>

            <div class="form-group">
                <label for="class">Student Class</label>
                <select name="class" id="class" class="form-control" required="required">
                    <option value="">Select</option>
                    <option value="1st" <?php if ($db_row['class'] == '1st'){echo 'selected';} ?> >1st</option>
                    <option value="2nd" <?php if ($db_row['class'] == '2nd'){echo 'selected';} ?> >2nd</option>
                    <option value="3rd" <?php if ($db_row['class'] == '3rd'){echo 'selected';} ?> >3rd</option>
                    <option value="4th" <?php if ($db_row['class'] == '4th'){echo 'selected';} ?> >4th</option>
                    <option value="5th" <?php if ($db_row['class'] == '5th'){echo 'selected';} ?> >5th</option>

                </select>
            </div>

            <div class="form-group">
                <label for="city">City</label>
                <input type="text" name="city" id="city" placeholder="Enter your city" class="form-control" required="required" value="<?= $db_row['city'];?>">
            </div>

            <div class="form-group">
                <label for="pcontact">Parent Contact No.</label>
                <input type="text" name="pcontact" id="pcontact" placeholder="01********" class="form-control" pattern="01[1|3|4|5|6|7|8|9][0-9]{8}" required="required" value="<?= $db_row['pcontact'];?>">
            </div>

            <div class="form-group">
                <input type="submit" value="Update Student" name="update_student" class="btn btn-primary pull-right">
            </div>
        </form>
    </div>
</div>