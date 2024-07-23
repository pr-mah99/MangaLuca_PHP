<!-- لوحة تحكم الخاصة بالمنشورات -->
<?php
session_set_cookie_params(0);
// بدا الجلسة الجديدة
session_start();
// أستدعاء كود اتصال بقاعدة البيانات
include('../config.php');
if (strlen($_SESSION['login']) == 0) {
    header('location: ../admin.php');
} else {
    // عند الضغط على زر الحذف
    if (isset($_REQUEST['del'])) {
        // يحذف البيانات بحسب رقم المنشور
        $delid = intval($_GET['del']);
        // الاستعلام
        $sql = "DELETE FROM news WHERE id=:delid";
        $query = $dbh->prepare($sql);
        $query->bindParam(':delid', $delid, PDO::PARAM_STR);
        // تنفيذ الاستعلام
        $query->execute();
        // طباعة الرسالة
        echo "<script>alert('Post has deleted successfully');document.location = 'manage-news.php';</script>";
    }
?>

    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>Manage Posts</title>
        <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic">
        <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
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
                margin: 20px;
                background-color: maroon;
                color: white;
                text-decoration: none;
                border-radius: 20px;
            }
            @media screen and (max-width: 900px) {              
        .container {
                width: 90%;
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


        <header class="masthead" style="background-image:url('../assets/img/home-bg.jpg');">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-lg-8 mx-auto">
                        <div class="site-heading">
                            <a href="../admin.php" class="go">- Home -</a>
                            <h1>Manage News</h1><span class="subheading">Update News information</span>                            
                            <br>
                            <a href="../Manga/manage-manga.php" class="go">- Manga -</a>                                                                                              
                        </div>

                    </div>
                </div>
            </div>
        </header>
        <!-- Header -->

        <div class="container">
            <div class="row">

                <div class="container-fluid">
                    <h3 class="text-dark mb-4">News</h3>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 font-weight-bold">News</p>
                        </div>
                        <a href="add-news.php" class="btn btn-primary">Add a New Post -</a>
                        <br>
                        <div class="card-body">
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table dataTable my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <!-- الاعمدة -->
                                            <th>#</th>
                                            <th>عنوان المنشور</th>                                                                                 
                                            <th>الوصف</th>
                                            <th>By: User</th>
                                            <th>تاريخ النشر </th>                                      
                                            <th>تعديل المنشور</th>
                                            <th>حذف المنشور</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        //    عرض بيانات مدير الموقع
                                        $email1 = $_SESSION['login'];
                                        $sql1 = "SELECT `id` FROM `users` WHERE `email`=:email1";
                                        $query1 = $dbh->prepare($sql1);
                                        $query1->bindParam(':email1', $email1, PDO::PARAM_STR);
                                        $query1->execute();
                                        $results1 = $query1->fetchAll(PDO::FETCH_OBJ);
                                        if ($query1->rowCount() > 0) {
                                            foreach ($results1 as $result1) {
                                                $uid = $result1->id;
                                            }
                                        }
                                        // عرض البيانات المنشورات على شكل بيانات
                                        $status = 1;
                                        $sql = "SELECT fullname,title,description,news.creationdate,news.id FROM news,users where user=users.id";
                                        $query = $dbh->prepare($sql);
                                        $query->execute();
                                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                                        $cnt = 1;
                                        if ($query->rowCount() > 0) {
                                            foreach ($results as $result) { ?>
                                                <tr>                                               
                                                    <td><?php echo htmlentities($cnt); ?></td>
                                                    <td><?php echo htmlentities($result->title); ?></td>                                                 
                                                    <td><?php echo substr( htmlentities($result->description),0,60); ?>...</td> 
                                                    <td><?php echo htmlentities($result->fullname)?></td> 
                                                    <td><?php echo htmlentities($result->creationdate); ?></td>                                                    
                                                    <td><a href="edit-news.php?id=<?php echo $result->id; ?>">Edit</a>
                                                    <td><a href="manage-news.php?del=<?php echo $result->id; ?>" onclick="return confirm('Do you want to delete?');">
                                                            <font color="Red">Delete</font>
                                                        </a>
                                                    </td>                                                   
                                                   
                                                </tr>
                                        <?php $cnt = $cnt + 1;
                                            }
                                        } ?>

                                    </tbody>
                                </table>
                            </div>
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

            <div class="row">

            </div>
        </div>
        <br><br>
        <!-- Footer -->

        <script src="../assets/js/jquery.min.js"></script>
        <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="../assets/js/clean-blog.js"></script>
    </body>

    </html>
<?php } ?>