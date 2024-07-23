<?php
session_set_cookie_params(0);
session_start();
error_reporting(0);
include('../config.php');
// في حالة لم يسجل دخول 
if (strlen($_SESSION['login']) == 0) {
    // ارجع الى الصفحة تسجيل دخول الادمن
    header('location: ../admin.php');
} else {
    // submit في حالة الضغط على 
    if (isset($_POST['submit'])) {      
        try{
 // نفذ الكود التالي
        // انشاء متغير لكل عمود
        // لكل وحدة html في name ويساوي 
        
        $name = $_POST['name'];
        $type = $_POST['manga_type'];
        $description = $_POST['description'];    
        $userid = $_SESSION['login_userid_manga'];    

        // استعلام ادخال بيانات الى جدول المنشورات
        $sql = "INSERT INTO manga(name,type,description,userid) VALUES(:name,:type,:description,:userid)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':name', $name, PDO::PARAM_STR);
        $query->bindParam(':type', $type, PDO::PARAM_STR);
        $query->bindParam(':description', $description, PDO::PARAM_STR);    
        $query->bindParam(':userid', $userid, PDO::PARAM_STR);  
        // تنفيذ الاستعلام
       
        $query->execute();
        $lastInsertId = $dbh->lastInsertId();
        if ($lastInsertId) {
            echo "<script>alert('تم اضافة المانجا بنجاح');document.location = 'manage-manga.php';</script>";
        } else {
            echo "<script>alert('عذراهناك خطا ما')</script>";
        }

        }        
            catch(PDOException $e){
                echo $sql . "<br>" . $e->getMessage();
            } 
       
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>Add Post</title>
        <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic">
        <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
        <!-- <script src="assets/js/tinymce.min.js" referrerpolicy="origin"></script>
        <script>tinymce.init({selector: 'textarea'});</script> -->
        <!-- مكاتب تنسيق الالوان الخاصة بالوصف -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Saira+Extra+Condensed:wght@700;800;900&display=swap">
        <link rel="stylesheet" href="../css/styles.css">
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
        table td{
            font-size: 17px;
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
                            <!-- زر العودة الى ادارة المنشورات -->
                            <a href="../uploads/Manga/manage-manga.php" class="go">- Back -</a>
                            <h1>Add Manga</h1><span class="subheading">- Create New Event -</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Header -->

        <div class="container">
            <div class="row">
                <div class="col-md-10 col-lg-8 mx-auto">
                    <h2 class="post-title">Add a Manga</h2>
                    <form id="contactForm" method="post" enctype="multipart/form-data">
                    
                        <div class="control-group">
                                    <label for="name"><strong>Manga Name</strong></label>
                                    <div class="form-group floating-label-form-group controls"><input class="form-control" type="text" placeholder="Manga Name" name="name" value="" required></div>
                                </div>

                                <div class="control-group">
                                    <label for="manga_type"><strong>Type</strong></label>
                                    <div class="form-group floating-label-form-group controls mb-3">
                                        <select class="form-control" required="" placeholder="Type" name="manga_type" id="manga_type">
                                             <option value="Manga">Manga</option>
                                             <option value="Manhwa">Manhwa</option>
                                             <option value="Comics">Comics</option>
                                        </select>
                                    <small class="form-text text-danger help-block"></small></div>
                                </div>

                                <div class="control-group">
                                    <label for="desc"><strong>Description</strong></label>
                                    <div class="form-group floating-label-form-group controls mb-3"><textarea class="form-control" id="desc" data-validation-required-message="Description" required="" placeholder="Description" rows="5" name="description"></textarea><small class="form-text text-danger help-block"></small></div>
                         </div>

                      
             
                        <br>
                        <div id="success"></div>
                        <div class="form-group">
                            <button class="btn btn-primary float-right" id="sendMessageButton" type="submit" name="submit">Save
                            </button>
                        </div>
                </div>              

                </form>
            </div>
        </div>
        </div>
        <br>
        <hr><br>

    <?php } ?>
    <!-- Footer -->

    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/clean-blog.js"></script>
    </body>

    </html>