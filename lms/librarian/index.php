<?php

require_once 'header.php';

?>
                <!-- content HEADER -->
                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row animated fadeInUp">
                    <div class="col-sm-12">
                        <div class="row">
                        <?php
                        $books = mysqli_query($db, "SELECT * FROM books");
                        $total_books = mysqli_num_rows($books);

                        $book_qty = mysqli_query($db, "SELECT sum(book_qty) as total FROM books");
                        $qty = mysqli_fetch_assoc($book_qty);
                        
                        $availabele_qty = mysqli_query($db, "SELECT sum(availabele_qty) as total FROM books");
                        $qty_a = mysqli_fetch_assoc($availabele_qty);
                        
                        ?>
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <div class="panel widgetbox wbox-1 bg-lighter-2 color-light">
                                    <a href="manage-books.php">
                                        <div class="panel-content">
                                            <h1 class="title color-darker-2"> <i class="fa fa-book"></i> <?= $total_books.' ('.$qty['total'].' - '.$qty_a['total'].')';?> </h1>
                                            <h4 class="subtitle color-darker-1">Total Books</h4>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            
                        <?php
                        $students = mysqli_query($db, "SELECT * FROM students");
                        $total_students = mysqli_num_rows($students);
                        ?>
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <div class="panel widgetbox wbox-1 bg-lighter-2 color-light">
                                    <a href="students.php">
                                        <div class="panel-content">
                                            <h1 class="title color-darker-2"> <i class="fa fa-users"></i> <?= $total_students;?> </h1>
                                            <h4 class="subtitle color-darker-1">Total Students</h4>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            
                        <?php
                        $librarian = mysqli_query($db, "SELECT * FROM librarian");
                        $total_librarian = mysqli_num_rows($librarian);
                        ?>
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <div class="panel widgetbox wbox-1 bg-lighter-2 color-light">
                                    <a href="#">
                                        <div class="panel-content">
                                            <h1 class="title color-darker-2"> <i class="fa fa-users"></i> <?= $total_librarian;?> </h1>
                                            <h4 class="subtitle color-darker-1">Total Librarian</h4>
                                        </div>
                                    </a>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>




<?php require_once 'footer.php'; ?>