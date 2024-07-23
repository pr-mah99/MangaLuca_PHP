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
    // كود ارسال اشعار
    // submit عند الضغط على زر
    if (isset($_REQUEST['notification'])) {
        try {

            // $sql = "UPDATE `chapter` SET state=:state WHERE id=:id and manga=:manga";

            // $state = "1";                        
            // $id = intval($_GET['id']);
            $manga = intval($_GET['manga']);
            $chapter = intval($_GET['notification']);
            // كود تحديث المنشور
            // Post اسم الجدول الموجود بقاعدة البيانات 

            // كود التاكد من وجود الحساب
            $sql = "SELECT id FROM notification WHERE chapter=:chapter and manga=:manga";
            $query = $dbh->prepare($sql);
            $query->bindParam(':manga', $manga, PDO::PARAM_STR);
            $query->bindParam(':chapter', $chapter, PDO::PARAM_STR);
            $query->execute();

            if ($query->rowCount() > 0) {
                // اذا موجود فلا تفعل شي 
                echo "<script>alert('هناك من سبقك بأرسال الاشعار 😁✔️');document.location = 'manage-chapter.php';</script>";       
            } else {
                $sql = "INSERT INTO notification(chapter,manga) VALUES(:chapter,:manga)";
                $query = $dbh->prepare($sql);
                // عمل براميترات لمنع اختراق الموقع
                $query->bindParam(':manga', $manga, PDO::PARAM_STR);
                $query->bindParam(':chapter', $chapter, PDO::PARAM_STR);
                // $query->bindParam(':id', $id, PDO::PARAM_STR);
                $query->execute();
                echo "<script>alert('تم ارسال الاشعار الى كافة المستخدمين المحبين للمانجا');document.location = 'manage-chapter.php';</script>";
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        } catch (InvalidArgumentException $e) {
            echo $e->getMessage();
        } finally {
            $sql = null;
        }
    }

    // عند الضغط على زر الحذف
    if (isset($_REQUEST['del_C'])) {
      
        // اذا كان محمود يسمح بالحذف

        $userid = $_SESSION['login_userid_manga']; 

        // ملاحظة استخدام الكوكي بدل السيسون لحل المشكلة
        $sql = "SELECT id FROM users WHERE type='Admin' and id=:id and email='Mahmoud.shmran88@gmail.com'";
        $query = $dbh->prepare($sql);
        $query->bindParam(':id', $userid, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        if ($query->rowCount() > 0) {       
                 

            // عملية الحذف  ===>>
            // الكود التالي هو لحذف الفصل من التخزين فقط
            //  1
            //  تحديد المانجا والفصل المراد حذفة
            $chapter = $_GET['del_C']; //id الفصل
            $chapter_number = $_GET['c']; //رقم الفصل
            $manga = $_GET['m']; //رقم المانجا
                  
            $folderPath =  "../../uploads/Manga/" . $manga . '/' . $chapter_number . '/';
        
            //  تحديد المانجا والفصل المراد حذفة انتهى
            // 2           
            // التحقق من وجود المجلد
            if (is_dir($folderPath)) {
                // فتح المجلد
                $directoryHandle = opendir($folderPath);
                
                // حذف الملفات داخل المجلد
                while (($file = readdir($directoryHandle)) !== false) {
                    if ($file != '.' && $file != '..') {
                        $filePath = $folderPath . '/' . $file;
                        if (is_file($filePath)) {
                            unlink($filePath); // حذف الملف
                        }
                    }
                }

                // إغلاق المجلد
                closedir($directoryHandle);

                // حذف المجلد نفسه بعد تفريغه من الملفات
                rmdir($folderPath);
                
                // echo 'تم حذف المجلد بنجاح.';
            } else {
                // echo 'المجلد غير موجود.';
            }           
        
            // الاستعلام
            $sql = "DELETE FROM chapter WHERE id=:chapter";
            $query = $dbh->prepare($sql);
            $query->bindParam(':chapter', $chapter, PDO::PARAM_STR);         
            // تنفيذ الاستعلام
            $query->execute();
            // طباعة الرسالة           
            echo "<script>alert('تم حذف فصل المانجا بنجاح');document.location = 'manage-chapter.php';</script>";
            
        } else {
            echo "<script>alert('غير مصرح لك بحذف هذا الفصل المانجا');document.location = 'manage-chapter.php';</script>";
        }
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
                .go {
                    display: block;
                    font-size: 15px;
                    margin-right: 11px;
                    margin-top: 6px;
                }

                .container {
                    width: 98%;
                    padding: 15px;
                }

                table th {
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

                            <a href="../welcome.php" class="go">- Home -</a>
                            <h1>Manage Chapter</h1><span class="subheading">Update Chapter Manga information</span>
                            <br>
                            <a href="../manage-total.php" class="go">- Total -</a>
                            <a href="../manage-contact.php" class="go">- Contact -</a>
                            <a href="../Manga/manage-manga.php" class="go">- Manga -</a>
                            <a href="../Chapter/manage-chapter.php" class="go">- Chapter -</a>
                            <a href="../News/manage-news.php" class="go">- News -</a>
                            <a href="../users/manage-users.php" class="go">- Users -</a><br><br>
                            <a href="../manage-comment.php" class="go">- Comment -</a>
                        </div>

                    </div>
                </div>
            </div>
        </header>
        <!-- Header -->

        <div class="container">
            <div class="row">

                <div class="container-fluid">
                    <h3 class="text-dark mb-4">Chapters</h3>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 font-weight-bold">Chapter</p>
                        </div>
                        <a href="add-chapter.php" class="btn btn-primary">Add a New Chapter -</a>
                        <br>
                        <div class="card-body">
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table dataTable my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <!-- الاعمدة -->
                                            <th>#</th>
                                            <th>عنوان المانجا</th>
                                            <th>نوع المانجا</th>
                                            <th>رقم الفصل</th>
                                            <th>عدد الصفحات</th>
                                            <th>By: User</th>
                                            <th>تعديل المانجا</th>
                                            <th>أرسال اشعار</th>
                                            <th>حذف الفصل</th>
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
                                        $sql = "SELECT chapter.id as 'chap_id', manga.id as 'manga_id', name,chapter,manga.type,papers,manga.id,fullname FROM manga,chapter,users where users.id=chapter.user and manga=manga.id order by date Desc";
                                        $query = $dbh->prepare($sql);
                                        $query->execute();
                                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                                        $cnt = 1;
                                        if ($query->rowCount() > 0) {
                                            foreach ($results as $result) { ?>
                                                <tr>
                                                    <td><?php echo htmlentities($cnt); ?></td>
                                                    <td><?php echo htmlentities($result->name); ?></td>
                                                    <td><?php echo htmlentities($result->type); ?></td>
                                                    <td><?php echo htmlentities($result->chapter); ?></td>
                                                    <td><?php echo htmlentities($result->papers); ?></td>
                                                    <td><?php echo htmlentities($result->fullname)?></td>
                                                    <td><a href="edit-chapter.php?id=<?php echo $result->chap_id; ?>">Edit</a>
                                                    <!-- <td><a href="manage-chapter.php?notification=<?php echo $result->chap_id; ?>&manga=<?php echo $result->manga_id; ?>">ارسال الان</a> -->
                                                    <td><a style="cursor:not-allowed;" >ارسال الان</a>
                                                    <td><a onclick="return confirm('?هل انت متاكد من حذف هذا فصل من المانجا')" href="manage-chapter.php?del_C=<?php echo $result->chap_id; ?>&m=<?php echo htmlentities($result->manga_id); ?>&c=<?php echo htmlentities($result->chapter); ?>">
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