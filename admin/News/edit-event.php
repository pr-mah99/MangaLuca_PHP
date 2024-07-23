<?php
session_set_cookie_params(0);
session_start();
error_reporting(0);
include('../config.php');

if (strlen($_SESSION['login']) == 0) {
    header('location: ../admin.php');
} else {
   
    // submit عند الضغط على زر
    if (isset($_POST['submit'])) {
        try{

      
        $title = $_POST['title'];
        $cat = $_POST['selectcat'];
        $description_en = $_POST['description_en'];
        $description_ar = $_POST['description_ar'];
        $id = intval($_GET['id']);
        // كود تحديث المنشور
        // Post اسم الجدول الموجود بقاعدة البيانات 

        $sql = "UPDATE `events` SET title=:title,description_en=:description_en,description_ar=:description_ar WHERE id=:id ";
        $query = $dbh->prepare($sql);
        // عمل براميترات لمنع اختراق الموقع
        $query->bindParam(':title', $title, PDO::PARAM_STR);
        $query->bindParam(':description_en', $description_en, PDO::PARAM_STR);
        $query->bindParam(':description_ar', $description_ar, PDO::PARAM_STR);
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->execute();

        echo "<script>alert('Event has updated successfully');document.location = 'manage-event.php';</script>";
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
                            <h1>Edit Event</h1><span class="subheading">Update Information</span>
                            <br><a href="manage-event.php" class="go">- Event -</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Header -->

        <div class="container">
            <div class="row">
                <div class="col-md-10 col-lg-8 mx-auto">
                    <h2 class="post-title">Edit a Event</h2>
                    <br>
                    <?php
                    // كود عرض بينات المنشور
                    $id = intval($_GET['id']);
                    $sql = "SELECT * FROM events WHERE events.id=:id";
                    // $sql = "SELECT events.*,events_images.image1 FROM events,events_images WHERE event_id=events.id and events.id=:id";
                    $query = $dbh->prepare($sql);
                    $query->bindParam(':id', $id, PDO::PARAM_STR);
                    $query->execute();
                    $results = $query->fetchAll(PDO::FETCH_OBJ);       
                    if ($query->rowCount() > 0) {
                        foreach ($results as $result) { ?>
                            <form id="contactForm" method="post" enctype="multipart/form-data">
                                <div class="control-group">
                                    <label for="title"><strong>Title</strong></label>
                                    <div class="form-group floating-label-form-group controls"><input class="form-control" type="text" id="title" required="" placeholder="Title" name="title" value="<?php echo htmlentities($result->title); ?>"><small class="form-text text-danger help-block"></small></div>
                                </div>

                                <div class="control-group">
                                    <label for="image1"><strong>Header Image</strong></label>
                                    <?php
                  $id = intval($_GET['id']);
                  // استعلام عرض بيانات
                  $sql1 = "SELECT image1 FROM events_images WHERE event_id=:id";
                  $query = $dbh->prepare($sql1);
                  $query->bindParam(':id', $id, PDO::PARAM_STR);
                  $query->execute();
                  $results_img = $query->fetchAll(PDO::FETCH_OBJ);
                  // اذا توفرت بيانات قم بعرضها
                  if ($query->rowCount() > 0) {
                    foreach ($results_img as $results_img) {
                  ?>
                  
                  <?php }
          } ?>


                                    <div class="form-group floating-label-form-group controls"><img src="../../uploads/Events/<?php echo htmlentities($results_img->image1); ?>" width="300" height="200" style="border:solid 1px #000"><br><br>
                                        <a href="changeimage.php?imgid=<?php echo htmlentities($result->id) ?>">Change
                                            Header Image</a>
                                        <small class="form-text text-danger help-block"></small>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label for="desc_en"><strong>Description English</strong></label>
                                    <div class="form-group floating-label-form-group controls mb-3"><textarea class="form-control" id="desc_en" data-validation-required-message="Description" required="" placeholder="Description English" rows="5" name="description_en"><?php echo htmlentities($result->description_en); ?></textarea><small class="form-text text-danger help-block"></small></div>
                         </div>
       
                                <div class="control-group">
                                    <label for="desc_ar"><strong>Description Arabic</strong></label>
                                    <div class="form-group floating-label-form-group controls mb-3"><textarea class="form-control" id="desc_ar" data-validation-required-message="Description" required="" placeholder="Description Arabic" rows="5" name="description_ar"><?php echo htmlentities($result->description_ar); ?></textarea><small class="form-text text-danger help-block"></small></div>
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