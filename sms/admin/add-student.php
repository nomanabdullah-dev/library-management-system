<?php

require_once 'dbcon.php';

?>


<H1 class="text-primary"><i class="fa fa-user-plus"></i> Add Student <small>Add New Student</small></H1>
<ol class="breadcrumb">
    <a href="index.php?page=dashboard">Dashboard</a>
    <li class="active"> <i class="fa fa-user-plus"></i> Add Student</li>
</ol>

<?php

if (isset($_POST['add_student'])) {
    $name = $_POST['name'];
    $roll = $_POST['roll'];
    $class = $_POST['class'];
    $city = $_POST['city'];
    $pcontact = $_POST['pcontact'];
    $picture = explode('.',$_FILES['picture']['name']);
    
    $picture_ext = end($picture);
    $picture_name = $roll.'_'.$class.'_.'.$picture_ext;

    $query1 = "INSERT INTO student_info (name,roll,class,city,pcontact,photo) VALUES ('$name','$roll','$class','$city','$pcontact','$picture_name')";

    $result = mysqli_query($db, $query1);

    if ($result) {
        $success = "Data Insert Successful";
        move_uploaded_file($_FILES['picture']['tmp_name'],'img/student_img/'.$picture_name);
    }else {
        $error = "Data Insert Error!";
    }

}
?>

<div class="row">
    <?php if(isset($success)){ echo '<p class="col-sm-6 alert alert-success">'.$success.'</p>'; }?>
    <?php if(isset($error)){ echo '<p class="col-sm-6 alert alert-danger">'.$error.'</p>'; }?>
</div>

<div class="row" style="margin-bottom:20px">
    <div class="col-sm-6">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Student Name</label>
                <input type="text" name="name" id="name" placeholder="Enter your name" class="form-control" required="required">
            </div>

            <div class="form-group">
                <label for="roll">Student Roll</label>
                <input type="text" name="roll" id="roll" placeholder="Enter your roll" class="form-control" pattern="[0-9]{6}" required="required">
            </div>

            <div class="form-group">
                <label for="class">Student Class</label>
                <select name="class" id="class" class="form-control" required="required">
                    <option value="">Select</option>
                    <option value="1st">1st</option>
                    <option value="2nd">2nd</option>
                    <option value="3rd">3rd</option>
                    <option value="4th">4th</option>
                    <option value="5th">5th</option>

                </select>
            </div>

            <div class="form-group">
                <label for="city">City</label>
                <input type="text" name="city" id="city" placeholder="Enter your city" class="form-control" required="required">
            </div>

            <div class="form-group">
                <label for="pcontact">Parent Contact No.</label>
                <input type="text" name="pcontact" id="pcontact" placeholder="01********" class="form-control" pattern="01[1|3|4|5|6|7|8|9][0-9]{8}" required="required">
            </div>

            <div class="form-group">
                <label for="picture">Picture</label>
                <input type="file" id="picture" name="picture" required="required">
            </div>

            <div class="form-group">
                <input type="submit" value="Add Student" name="add_student" class="btn btn-primary pull-right">
            </div>
        </form>
    </div>
</div>