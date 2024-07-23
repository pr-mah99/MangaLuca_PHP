<?php
error_reporting(0);
session_set_cookie_params(0);
session_start();
include('../config.php');

if (strlen($_SESSION['login']) == 0) {
    header('location: ../admin.php');
} else {
   
    // submit عند الضغط على زر
    if (isset($_POST['submit'])) {
        try{

        $chapter = $_POST['chapter'];
        

        $id = intval($_GET['id']);
        // كود تحديث المنشور
        // Post اسم الجدول الموجود بقاعدة البيانات 

        $sql = "UPDATE `chapter` SET chapter=:chapter WHERE id=:id ";
        $query = $dbh->prepare($sql);
        // عمل براميترات لمنع اختراق الموقع
        $query->bindParam(':chapter', $chapter, PDO::PARAM_STR);
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->execute();

        echo "<script>alert('Chapter has updated successfully');document.location = 'manage-chapter.php';</script>";
        }
        catch (Exception $e) {
            echo $e->getMessage();         
        }
        catch (InvalidArgumentException $e) {
            echo $e->getMessage();
        }
        finally{
            $sql = null;
        }
    }
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>Edit Post</title>
        <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic">
        <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
        <link rel="stylesheet" href="../css/styles.css">
        <style>
            
            @media screen and (max-width: 900px) {              
        .container {
                width: 90%;
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
                            <a class="go">- Home -</a>
                            <h1>Edit Chapters</h1><span class="subheading">Update Information</span>
                            <br><a href="manage-chapter.php" class="go">- Chapter -</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Header -->

        <div class="container">
            <div class="row">
                <div class="col-md-10 col-lg-8 mx-auto">
                    <h2 class="post-title">تعديل الفصل</h2>
                    <br>
                    <?php
                    // كود عرض بينات المنشور
                    $id = intval($_GET['id']);
                    $sql = "SELECT manga.id as 'id',chapter.id as 'ch_id',image1,name,chapter FROM manga,chapter WHERE manga.id=manga and chapter.id=:id";
                    // $sql = "SELECT events.*,events_images.image1 FROM events,events_images WHERE event_id=events.id and events.id=:id";
                    $query = $dbh->prepare($sql);
                    $query->bindParam(':id', $id, PDO::PARAM_STR);
                    $query->execute();
                    $results = $query->fetchAll(PDO::FETCH_OBJ);       
                    if ($query->rowCount() > 0) {
                        foreach ($results as $result) { ?>
                            <form id="contactForm" method="post" enctype="multipart/form-data">
                            <div class="control-group">
                                    <label for="title"><strong>أسم المانجا</strong></label>
                                    <div class="form-group floating-label-form-group controls"><input class="form-control" type="text"  required="" placeholder="Manga Name" name="name" value="<?php echo htmlentities($result->name); ?>"><small class="form-text text-danger help-block"></small></div>
                                </div>

                                <div class="control-group">
                                    <label for="title"><strong>الفصل</strong></label>
                                    <div class="form-group floating-label-form-group controls"><input class="form-control" type="text" required="" placeholder="Manga Name" name="chapter" value="<?php echo htmlentities($result->chapter); ?>"><small class="form-text text-danger help-block"></small></div>
                                </div>                            

                                <div class="control-group">
                                    <label for="image1"><strong>الغلاف</strong></label>
                                                                                                         
                                    <div class="form-group floating-label-form-group controls">
                                        <img src="../../uploads/Poster/<?php echo htmlentities($result->image1); ?>" width="300" height="200" style="border:solid 1px #000;back;"><br><br>
                                        <a href="changeimage.php?ch=<?php echo htmlentities($result->chapter) ?>&manga_id=<?php echo htmlentities($result->id) ?>">Add Photos To Chapter</a>
                                        <p>ملاحظة: هنا يمكنك إدراج الصور في الفصل</p>
                                        <small class="form-text text-danger help-block"></small>
                                    </div>
                                </div>                               
                                     
                        <?php }
                    } ?>             

                        <div id="success"></div>
                        <div class="form-group">
                            <button class="btn btn-primary" id="sendMessageButton" type="submit" name="submit">Update</button>
                         </div>
                            </form>
                </div>
            </div>
        </div>
        <hr><br>


        <script src="../assets/js/jquery.min.js"></script>
        <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="../assets/js/clean-blog.js"></script>
    </body>

    </html>

<?php } ?>