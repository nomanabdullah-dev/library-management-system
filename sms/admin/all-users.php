<H1 class="text-primary"><i class="fa fa-users"></i> All Users <small>All Users</small></H1>
<ol class="breadcrumb">
    <a href="index.php?page=dashboard">Dashboard</a>
    <li class="active"> <i class="fa fa-users"></i> All Users</li>
</ol>


                    <div class="table-responsive">
                        <table id="data" class="table table-hover table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Username</th>
                                    <th>Photo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $s_info = mysqli_query($db, "SELECT * FROM users");
                                $count = 0;
                                while ($row = mysqli_fetch_assoc($s_info)) {
                                    ?>
                                    
                                    <tr>
                                        <td><?= $count;?></td>
                                        <td><?= ucwords($row['name']);?></td>
                                        <td><?= $row['email'];?></td>
                                        <td><?= $row['username'];?></td>
                                        <td><img src="img/<?= $row['photo'];?>" width="100px"></td>
                                    </tr>
                                    <?php
                                    $count++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>