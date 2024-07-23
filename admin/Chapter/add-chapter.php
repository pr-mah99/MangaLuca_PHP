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
        try {
            // نفذ الكود التالي
            // انشاء متغير لكل عمود
            // لكل وحدة html في name ويساوي 
            $chapter = $_POST['chapter'];
            $manga = $_POST['manga'];
            $userid = $_SESSION['login_userid_manga'];
            // استعلام ادخال بيانات الى جدول المنشورات
            $sql = "INSERT INTO chapter(chapter,manga,user) VALUES(:chapter,:manga,:userid)";
            $query = $dbh->prepare($sql);
            $query->bindParam(':chapter', $chapter, PDO::PARAM_STR);
            $query->bindParam(':manga', $manga, PDO::PARAM_STR);
            $query->bindParam(':userid', $userid, PDO::PARAM_STR);
            // تنفيذ الاستعلام

            $query->execute();
            $lastInsertId = $dbh->lastInsertId();
            if ($lastInsertId) {
                echo "<script>alert('تم اضافة فصل جديد للمانجا بنجاح');document.location = 'manage-chapter.php';</script>";
            } else {
                echo "<script>alert('عذراهناك خطا ما')</script>";
            }
        } catch (PDOException $e) {
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







            <!-- Loading Bootstrap -->
    <link href="dist/css/vendor/bootstrap.min.css" rel="stylesheet">

<!-- Loading Flat UI -->
<link href="dist/css/flat-ui.css" rel="stylesheet">
<link href="docs/assets/css/demo.css" rel="stylesheet">

<link rel="shortcut icon" href="dist/favicon.ico">

<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
<!--[if lt IE 9]>
  <script src="dist/js/vendor/html5shiv.js"></script>
  <script src="dist/js/vendor/respond.min.js"></script>
<![endif]-->




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

                table td {
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
                            <a href="../Chapter/manage-chapter.php" class="go">- Back -</a>
                            <h1>Add Chapter</h1><span class="subheading">- Create New Chapter -</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Header -->

        <div class="container">
            <div class="row">
                <div class="col-md-10 col-lg-8 mx-auto">
                    <h2 class="post-title">Add a Manga</h2><br>
                    <form id="contactForm" method="post" enctype="multipart/form-data">

                        <div class="control-group">
                            <label for="name"><strong>Chapter</strong></label>
                            <div class="form-group floating-label-form-group controls"><input class="form-control" type="text" placeholder="Chapter Number" name="chapter" value="" required></div>
                        </div> 

                        <div class="control-group">
                            <label for="select1"><strong>Manga Name</strong></label>
                            <div class="form-group floating-label-form-group controls">
                                <select class="form-control select select-primary" data-toggle="select" id="manga" name="manga" required>
                                    <option value="">-- Select --</option>
                                    <!--Option في هذا القسم نستدعي الاقضية والنواحي من جدول الخاص بها ونعرضها بداخل -->
                                    <?php $ret = "SELECT id,name FROM manga";
                                    $query = $dbh->prepare($ret);
                                    //$query->bindParam(':id',$id, PDO::PARAM_STR);
                                    $query->execute();
                                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                                    if ($query->rowCount() > 0) {
                                        foreach ($results as $result) {
                                    ?>
                                            <option value="<?php echo htmlentities($result->id); ?>">
                                                <?php echo htmlentities($result->name); ?>
                                            </option>
                                    <?php }
                                    } ?>
                                </select>
                                <small class="form-text text-danger help-block">Choice the Manga</small>
                            </div>
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

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <!-- Bootstrap 4 requires Popper.js -->
    <script src="https://unpkg.com/popper.js@1.14.1/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="http://vjs.zencdn.net/6.6.3/video.js"></script>
    <script src="dist/scripts/flat-ui.js"></script>
    <script src="docs/assets/js/application.js"></script>
    </body>

    </html>