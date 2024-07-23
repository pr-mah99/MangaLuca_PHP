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

    function deleteFolder($folderPath) {
        if (is_dir($folderPath)) {
            $directoryHandle = opendir($folderPath);
            
            while (($file = readdir($directoryHandle)) !== false) {
                if ($file != '.' && $file != '..') {
                    $filePath = $folderPath . '/' . $file;
                    if (is_dir($filePath)) {
                        // استدعاء الدالة مرة أخرى لحذف المجلد الفرعي
                        deleteFolder($filePath);
                    } else {
                        unlink($filePath); // حذف الملف
                    }
                }
            }
    
            closedir($directoryHandle);
    
            // حذف المجلد نفسه بعد تفريغه من الملفات والمجلدات الفرعية
            rmdir($folderPath);
        }
    }
    
    // عند الضغط على زر الحذف
    if (isset($_REQUEST['del'])) {
          // اذا كان محمود يسمح بالحذف

          $userid = $_SESSION['login_userid_manga'];
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
         $manga = $_GET['del']; //اسم المانجا         
         $folderPath=  "../../uploads/Manga/" . $manga . '/';       
        //  تحديد المانجا والفصل المراد حذفة انتهى
        // 2
        
        //  نستدعي الدالة حذف المجلد


      

         // 2           
            // التحقق من وجود المجلد
            if (is_dir($folderPath)) {               

                // حذف المجلد نفسه بعد تفريغه من الملفات
                deleteFolder($folderPath);
                
                // echo 'تم حذف المجلد بنجاح.';
            } else {
                // echo 'المجلد غير موجود.';
            }           

         
        // رسالة تاكيد قبل الحذف 
        // يحذف البيانات بحسب رقم المانجا
        // $delid = intval($_GET['del']);
        // الاستعلام
        $sql = "DELETE FROM manga WHERE id=:id";
        $query = $dbh->prepare($sql);
        $query->bindParam(':id', $manga, PDO::PARAM_STR);
        // تنفيذ الاستعلام
        $query->execute();
  // طباعة الرسالة
  echo "<script>alert('تم حذف المانجا بنجاح');document.location = 'manage-manga.php';</script>";
          
                                  
          }
          else {
              echo "<script>alert('غير مصرح لك بحذف هذا المانجا');document.location = 'manage-manga.php';</script>";            
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
                .go{
                    display: block;
                    font-size: 15px;
                    margin-right: 11px;
                    margin-top: 6px;
                }
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
                            <a href="../welcome.php" class="go">- Home -</a>
                            <h1>Manage Manga</h1><span class="subheading">Update manga information</span>
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
                    <h3 class="text-dark mb-4">Manga</h3>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 font-weight-bold">Manga</p>
                        </div>
                        <a href="add-manga.php" class="btn btn-primary">Add a New Manga -</a>
                        <br>
                        <div class="card-body">
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table dataTable my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <!-- الاعمدة -->
                                            <th>#</th>
                                            <th>عنوان المانجا</th>
                                            <th>نووع المانجا</th>
                                            <th>عدد المشاهدات</th>
                                            <th>تعديل المانجا</th>
                                            <th>حذف المانجا</th>
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
                                        $sql = "SELECT name,type,view_total,id FROM manga";
                                        $query = $dbh->prepare($sql);
                                        $query->execute();
                                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                                        $cnt = 1;
                                        if ($query->rowCount() > 0) {
                                            foreach ($results as $result) {                                                                                              
                                                ?>
                                                <tr>                                                  
                                                    <td><?php echo htmlentities($cnt); ?></td>
                                                    <td><?php echo htmlentities($result->name); ?></td>
                                                    <td><?php echo htmlentities($result->type); ?></td>
                                                    <td><?php echo htmlentities($result->view_total); ?></td>
                                                    <td><a href="edit-manga.php?id=<?php echo $result->id; ?>">Edit</a>
                                                    <td><a onclick="return confirm('?هل انت متاكد من حذف هذة المانجا')" href="manage-manga.php?del=<?php echo $result->id; ?>"
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