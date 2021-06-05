<H1 class="text-primary"><i class="fa fa-users"></i> All Students <small>All Students</small></H1>
<ol class="breadcrumb">
    <a href="index.php?page=dashboard">Dashboard</a>
    <li class="active"> <i class="fa fa-users"></i> All Student</li>
</ol>


                    <div class="table-responsive">
                        <table id="data" class="table table-hover table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Roll</th>
                                    <th>Class</th>
                                    <th>City</th>
                                    <th>Contact</th>
                                    <th>Photo</th>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $s_info = mysqli_query($db, "SELECT * FROM student_info");
                                $count = 0;
                                while ($row = mysqli_fetch_assoc($s_info)) {
                                    ?>
                                    
                                    <tr>
                                        <td><?= $count;?></td>
                                        <td><?= ucwords($row['name']);?></td>
                                        <td><?= $row['roll'];?></td>
                                        <td><?= $row['class'];?></td>
                                        <td><?= ucwords($row['city']);?></td>
                                        <td><?= $row['pcontact'];?></td>
                                        <td><img src="img/student_img/<?= $row['photo'];?>" width="100px"></td>
                                        <td>
                                            <a href="index.php?page=update-student&id=<?= base64_encode($row['id']);?>" class="btn btn-xs btn-warning"><i class="fa fa-pencil">Edit</a>
                                            <a href="delete_student.php?id=<?= base64_encode($row['id']);?>" class="btn btn-xs btn-danger"><i class="fa fa-trash">Delete</a>
                                        </td>
                                    </tr>
                                    <?php
                                    $count++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>