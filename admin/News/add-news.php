<?php
session_set_cookie_params(0);
session_start();
error_reporting(0);
include('../config.php');
// في حالة لم يسجل دخول 
if (strlen($_SESSION['login']) == 0) {
    // ارجع الى الصفحة تسجيل دخول الادمن
    header('location: admin.php');
} else {
    // submit في حالة الضغط على 
    if (isset($_POST['submit'])) {
        try{
            $title = $_POST['title'];            
            $userid = $_SESSION['login_userid_manga'];  
            $description = $_POST['description'];      
            // استعلام ادخال بيانات الى جدول المنشورات
            $sql = "INSERT INTO news(title,description,user) VALUES(:title,:description,:user)";
            $query = $dbh->prepare($sql);
            $query->bindParam(':title', $title, PDO::PARAM_STR);          
            $query->bindParam(':user', $userid, PDO::PARAM_STR);
            $query->bindParam(':description', $description, PDO::PARAM_STR);


            
              
            // تنفيذ الاستعلام
            $query->execute();
            $lastInsertId = $dbh->lastInsertId();
            if ($lastInsertId) {
                echo "<script>alert('Added successfully News');document.location = '../News/manage-news.php';</script>";
            } else {
                echo "<script>alert('Something went wrong')</script>";
            }
        }
            catch(PDOException $e){
                echo $sql . "<br>" . $e->getMessage();
            }
        // نفذ الكود التالي
        // انشاء متغير لكل عمود
        // لكل وحدة html في name ويساوي 
       
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
                            <a href="manage-news.php" class="go">- Back -</a>
                            <h1>Add Post</h1><span class="subheading">- Create New Post -</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Header -->

        <div class="container">
            <div class="row">
                <div class="col-md-10 col-lg-8 mx-auto">
                    <h2 class="post-title">Add a post</h2>
                    <form id="contactForm" method="post" enctype="multipart/form-data">
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls">
                                <label for="title">Title</label>
                                <input class="form-control" type="text" id="title" required placeholder="Title" name="title">
                                <small class="form-text text-danger help-block">Title</small>
                            </div>
                        </div>                                                                

                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls">
                                <label for="desc_ar">Description</label>
                                <textarea class="form-control" id="desc" required rows="5" name="description"></textarea>
                                <small class="form-text text-danger help-block">Description</small>
                            </div>
                        </div>                
                        <br>
                        <div id="success"></div>
                        <div class="form-group">
                            <button class="btn btn-primary float-right" id="sendMessageButton" type="submit" name="submit">Post
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