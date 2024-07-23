<?php
session_set_cookie_params(0);
session_start();
include('config.php');
// اذا لم يتم تسجيل الدخول
if (strlen($_SESSION['login']) == 0) {
    // افتح الصفحة التالية
    header('location: admin.php');
} else {
    // كود حذف الرسائل المرسلة
    if (isset($_REQUEST['del_c'])) {
        $delid = intval($_GET['del']);
        // استعلام الحذف
        $sql = "DELETE FROM contact WHERE id=:delid";
        $query = $dbh->prepare($sql);
        $query->bindParam(':delid', $delid, PDO::PARAM_STR);
        // تنفيذ الاستعلام
        $query->execute();
        // طباعة رسالة
        echo "<script>alert('Comment Manga has deleted successfully');document.location = 'manage-comment.php';</script>";
    }
    if (isset($_REQUEST['del_r'])) {
        $delid = intval($_GET['del']);
        // استعلام الحذف
        $sql = "DELETE FROM request WHERE id=:delid";
        $query = $dbh->prepare($sql);
        $query->bindParam(':delid', $delid, PDO::PARAM_STR);
        // تنفيذ الاستعلام
        $query->execute();
        // طباعة رسالة
        echo "<script>alert('Comment Chapter has deleted successfully');document.location = 'manage-comment.php';</script>";
    }
?>

    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>Manage Posts</title>
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic">
        <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
        <style>
            .go {
                background-color: blueviolet;
                color: white;
                -webkit-transition: .3s ease-in-out;
                transition: .3s ease-in-out;
                padding: 10px;
                opacity: 0.5;
            }

            .go:hover {
                opacity: 0.8;
                font-size: 16px;
                padding: 20px;
                background-color: maroon;
                color: white;
                text-decoration: none;
                border-radius: 20px;
            }
            @media screen and (max-width: 900px) {              
        .container {
                width: 90%;
            }   
            table {
                max-width: 100%;
            }
            table th{
                    font-size: 10px;
                }

                table td {
                    font-size: 12px;
                    text-align: center;
                }
}   
        </style>
    </head>

    <body>

           <!-- Header -->

           <header class="masthead" style="background-image:url('assets/img/home-bg.jpg');">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-lg-8 mx-auto">
                        <div class="site-heading">
                            <a href="admin.php" class="go">- Home -</a>
                            <h1>Manage Comment</h1><span class="subheading">Comment Edit Information</span>
                            <br><a href="Manga/manage-manga.php" class="go">- Manga -</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Header -->


                    <!-- Comment Code Start  --> 

        <div class="container">
            <div class="row">

                <div class="container-fluid">
                    <h3 class="text-dark mb-4">#1 Comment of Manga</h3>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 font-weight-bold">Comment Message</p>
                        </div>
                        <a href="" class="btn btn-primary">Manage the Comment</a>
                        <br>
                        <div class="card-body">
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <!-- انشاء جدول لعرض البيانات -->
                                <!-- الجدول يتكون من اعمدة وصفوف -->
                                <table class="table dataTable my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <!-- الاعمدة -->
                                            <th>#</th>
                                            <th>Fullname</th>                                                                             
                                            <th>Comments</th>
                                            <th>Type</th>        
                                            <th>Email</th>                                    
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php


                                        //    الصفوف هية بيانات من الجدول المخزن في قاعدة البيانات
                                        // الاستعلام
                                        $sql = "SELECT comments.id as 'id',manga.name as 'Name',manga.Type as 'type',comment,fullname,email,comments.creationdate as 'date' FROM comments,manga,users WHERE users.id=comments.user_id and manga.id=comments.m_c_d and comments.type='Manga' order by comments.creationdate DESC;";
                                        $query = $dbh->prepare($sql);
                                        $query->execute();
                                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                                        $cnt = 1;
                                        if ($query->rowCount() > 0) {
                                            // Foreach استخدام
                                            // لطباعة كل العناصر في وقت واحد
                                            foreach ($results as $result) { ?>
                                                <tr>
                                                    <!-- نحدد اسم العمود لطباعة بياناتة -->
                                                    <td><?php echo htmlentities($cnt); ?></td>
                                                    <td><?php echo htmlentities($result->fullname)?></td>
                                                    <td><?php echo htmlentities($result->comment); ?></td>
                                                    <td><?php echo htmlentities($result->type); ?></td>
                                                    <td><?php echo htmlentities($result->email); ?></td>
                                                    <td><?php echo htmlentities($result->date); ?></td>
                                                    <td><a href="manage-comment.php?del_c=<?php echo $result->id; ?>" onclick="return confirm('Do you want to delete?');">
                                                            <font color="red"><B>Delete</font>
                                                        </a>
                                                        <!-- عند الضغط على الحذف يتم اخذ الرقم الرسالة وحذف بحسب الرقم -->
                                                    </td>
                                                </tr>
                                        <?php $cnt = $cnt + 1;
                                            }
                                        } ?>

                                    </tbody>
                                </table>
                            </div>

                            <!-- الصفحات -->
                            <div class="row">
                                <div class="col-md-6 align-self-center">
                                    <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">
                                        Showing 1 to 5 of 100</p>
                                </div>
                                <div class="col-md-6">
                                    <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                        <ul class="pagination">
                                            <li class="page-item disabled"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
                 <!-- Comment Code End  -->




<br>






        <!-- Request Code Start  -->
           
        <div class="container">
            <div class="row">

                <div class="container-fluid">
                    <h3 class="text-dark mb-4">#2 Comment of Chapters</h3>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 font-weight-bold">Comment Message</p>
                        </div>
                        <a href="" class="btn btn-primary">Manage the Comment</a>
                        <br>
                        <div class="card-body">
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <!-- انشاء جدول لعرض البيانات -->
                                <!-- الجدول يتكون من اعمدة وصفوف -->
                                <table class="table dataTable my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <!-- الاعمدة -->
                                            <th>#</th>
                                            <th>Fullname</th>
                                            <th>Manga Name</th>
                                            <th>Chapter</th>
                                            <th>Comments</th>
                                            <th>Email</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php


                                        //    الصفوف هية بيانات من الجدول المخزن في قاعدة البيانات
                                        // الاستعلام
                                        $sql = "SELECT comments.id as 'id',manga.name,chapter.chapter as 'chapter',comment,fullname,email,comments.creationdate as 'date' FROM comments,chapter,manga,users WHERE users.id=comments.user_id and manga.id=chapter.manga and chapter.id=comments.m_c_d and comments.type='Chapter' order by comments.creationdate DESC;";
                                        $query = $dbh->prepare($sql);
                                        $query->execute();
                                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                                        $cnt = 1;
                                        if ($query->rowCount() > 0) {
                                            // Foreach استخدام
                                            // لطباعة كل العناصر في وقت واحد
                                            foreach ($results as $result) { ?>
                                                <tr>
                                                    <!-- نحدد اسم العمود لطباعة بياناتة -->
                                                    <td><?php echo htmlentities($cnt); ?></td>
                                                    <td><?php echo htmlentities($result->fullname)?></td>
                                                    <td><?php echo htmlentities($result->name); ?></td>                                                                                        
                                                    <td><?php echo htmlentities($result->chapter); ?></td>
                                                    <td><?php echo htmlentities($result->comment); ?></td>
                                                    <td><?php echo htmlentities($result->email); ?></td>
                                                    <td><?php echo htmlentities($result->date); ?></td>
                                                    <td><a href="manage-comment.php?del_r=<?php echo $result->id; ?>" onclick="return confirm('Do you want to delete?');">
                                                            <font color="red"><B>Delete</font>
                                                        </a>
                                                        <!-- عند الضغط على الحذف يتم اخذ الرقم الرسالة وحذف بحسب الرقم -->
                                                    </td>
                                                </tr>
                                        <?php $cnt = $cnt + 1;
                                            }
                                        } ?>

                                    </tbody>
                                </table>
                            </div>

                            <!-- الصفحات -->
                            <div class="row">
                                <div class="col-md-6 align-self-center">
                                    <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">
                                        Showing 1 to 5 of 100</p>
                                </div>
                                <div class="col-md-6">
                                    <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                        <ul class="pagination">
                                            <li class="page-item disabled"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

                <!-- Comment Chapter Code End  -->



            <div class="row">

            </div>
        </div>
        <br><br>
        <!-- Footer -->

        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/clean-blog.js"></script>
    </body>

    </html>
<?php } ?>