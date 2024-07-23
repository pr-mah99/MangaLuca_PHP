<?php
session_set_cookie_params(0);
session_start();
error_reporting(0);
include('../config.php');
if (strlen($_SESSION['login']) == 0) {
    header('location: ../admin.php');
} else {
    // update عند الضغط على زر 
    if (isset($_POST['update'])) {
        // كود تحديث الصورة بحسب رقم المنشور    
        $image1 = $_FILES["img1"]["name"];
        $id = intval($_GET['imgid']);
        move_uploaded_file($_FILES["img1"]["tmp_name"], "../../uploads/Poster/" . $_FILES["img1"]["name"]);
        $sql = "UPDATE manga SET image1=:image1 WHERE id=:id";
        $query = $dbh->prepare($sql);
        $query->bindParam(':image1', $image1, PDO::PARAM_STR);
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        // تنفيذ الاستعلام
        $query->execute();
        // طبع رسالة تم العملية بنجاح
        echo "<script>alert('Image updated successfully');</script>";
    }
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>Update Header Image</title>
        <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic">
        <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
    </head>

    <body>

        <header class="masthead" style="background-image:url('../assets/img/home-bg.jpg');">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-lg-8 mx-auto">
                        <div class="site-heading">
                            <a href="manage-manga.php">- Home -</a>
                            <h1>Post Image</h1><span class="subheading">Update Header Photo</span>
                            <br><a href="manage-manga.php">- Manga -</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Header -->
        <center>
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-lg-8 mx-auto">
                        <h2 class="post-title">Update Header Image</h2>
                        <br>
                        <?php
                        $id = intval($_GET['imgid']);
                        // كود عرض الصورة لغرض المعاينة
                        // يتم عرض الصورة بحسب رقم المنشور
                        $sql = "SELECT image1 FROM manga WHERE id=:id";
                        $query = $dbh->prepare($sql);
                        $query->bindParam(':id', $id, PDO::PARAM_STR);
                        $query->execute();
                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                        $cnt = 1;
                        if ($query->rowCount() > 0) {
                            foreach ($results

                                as $result) { ?>


                                <!-- كود HTML -->


                                <form id="contactForm" method="post" enctype="multipart/form-data">
                                    <div class="col-sm-8">
                                        <img src="../../uploads/Poster/<?php echo htmlentities($result->image1); ?>" width="300" height="200" style="border:solid 1px #000">
                                    </div>
                            <?php }
                        } ?>

                            <br>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Upload New Header Image 1<span style="color:red">*</span></label>
                                <div class="col-sm-8">
                                    <input type="file" name="img1" required>
                                </div>
                            </div>
                            <div class="hr-dashed"></div>
                            <div id="success"></div>
                            <div class="form-group">
                                <button class="btn btn-primary" id="sendMessageButton" type="submit" name="update">Update
                                </button>
                            </div>
                                </form>
                    </div>
                </div>
            </div>
            <hr><br>
        </center>
        <!-- Footer -->

        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/clean-blog.js"></script>
    </body>

    </html>

<?php } ?>