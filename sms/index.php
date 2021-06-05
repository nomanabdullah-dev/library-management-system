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
  <body>
  <div class="container">
            <br>
            <a class="btn btn-primary pull-right" href="admin/login.php">Login</a>
            <br><br>
            <h1 class="text-center">Welcome to Students Management System</h1>
            <br><br>
            <div class="row">
                <div class="col-sm-4 col-sm-offset-4">
                    <form action="" method="POST">
                        <table class="table table-bordered">
                            <tr>
                                <td colspan="2" class="text-center"><label>Student Information</label></td>
                            </tr>
                            <tr>
                                <td><label for="choose">Choose Class</label></td>
                                <td>
                                    <select class="form-control" id="choose" name="choose">
                                        <option value="">Select</option>
                                        <option value="1St">1St</option>
                                        <option value="2nd">2nd</option>
                                        <option value="3rd">3rd</option>
                                        <option value="4th">4th</option>
                                        <option value="5th">5th</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="roll">Roll</label></td>
                                <td><input  class="form-control"type="text" id="roll" name="roll" pattern="[0-9]{6}" placeholder="Roll"></td>
                            </tr>
                            <tr>
                                <td  class="text-center" colspan="2"><input class="btn btn-default" type="submit" name="show_info" value="Show Info"></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
            <br><br>

            <?php
            require_once 'admin/dbcon.php';

            if (isset($_POST['show_info'])) {
                $choose = $_POST['choose'];
                $roll = $_POST['roll'];

                $result = mysqli_query($db, "SELECT * FROM student_info WHERE class='$choose' AND roll='$roll'");
                
                if (mysqli_num_rows($result) == 1) {
                    $row = mysqli_fetch_assoc($result);
                    ?>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                            <table class="table table-bordered table-hover">
                                <tr>
                                    <td rowspan="5"><img src="admin/img/student_img/<?= $row['photo'];?>" width="150px" class="img-thumbnail"></td>
                                </tr>
                                <tr>
                                    <td>Name</td>
                                    <td><?= ucwords($row['name']);?></td>
                                </tr>
                                <tr>
                                    <td>Roll</td>
                                    <td><?= $row['roll'];?></td>
                                </tr>
                                <tr>
                                    <td>Class</td>
                                    <td><?= $row['class'];?></td>
                                </tr>
                                <tr>
                                    <td>City</td>
                                    <td><?= ucwords($row['city']);?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    
                    <?php
                }else{
                    ?> <script>alert('Data Not Found')</script> <?php
                }
            }
            ?>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
  </body>
</html>