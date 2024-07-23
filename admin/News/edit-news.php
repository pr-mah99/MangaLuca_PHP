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
            $description = $_POST['description'];
            $id = intval($_GET['id']);
            // كود تحديث المنشور
            // Post اسم الجدول الموجود بقاعدة البيانات 

            $sql = "UPDATE `news` SET title=:title,description=:description WHERE id=:id ";
            $query = $dbh->prepare($sql);
            // عمل براميترات لمنع اختراق الموقع
            $query->bindParam(':title', $title, PDO::PARAM_STR);
            $query->bindParam(':description', $description, PDO::PARAM_STR);
            $query->bindParam(':id', $id, PDO::PARAM_STR);
            $query->execute();

            echo "<script>alert('Post has updated successfully');document.location = 'manage-news.php';</script>";
        }
        catch(PDOException $e){
            echo $sql . "<br>" . $e->getMessage();
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
        <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
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
       
}   
        </style>
    </head>

    <body>        
        <!-- Header -->
        <?php include 'includes/header.php'; ?>

        <header class="masthead" style="background-image:url('../assets/img/home-bg.jpg');">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-lg-8 mx-auto">
                        <div class="site-heading">
                            <a href="../welcome.php" class="go">- Home -</a>
                            <h1>Edit News</h1><span class="subheading">Update Information</span>
                            <br><a href="manage-news.php" class="go">- News -</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Header -->

        <div class="container">
            <div class="row">
                <div class="col-md-10 col-lg-8 mx-auto">
                    <h2 class="post-title">Edit a News</h2>
                    <br>
                    <?php
                    // كود عرض بينات المنشور
                    $id = intval($_GET['id']);
                    $sql = "SELECT news.* FROM news WHERE news.id=:id";
                    $query = $dbh->prepare($sql);
                    $query->bindParam(':id', $id, PDO::PARAM_STR);
                    $query->execute();
                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                    $cnt = 1;
                    if ($query->rowCount() > 0) {
                        foreach ($results

                            as $result) { ?>
                            <form id="contactForm" method="post" enctype="multipart/form-data">
                                <div class="control-group">
                                    <label for="title"><strong>Title</strong></label>
                                    <div class="form-group floating-label-form-group controls"><input class="form-control" type="text" id="title" required="" placeholder="Title" name="title" value="<?php echo htmlentities($result->title); ?>"><small class="form-text text-danger help-block"></small></div>
                                </div>                            

                                <div class="control-group">
                                    <label for="desc"><strong>Description</strong></label>
                                    <div class="form-group floating-label-form-group controls mb-3"><textarea class="form-control" id="desc" data-validation-required-message="Description" required="" placeholder="Description" rows="5" name="description"><?php echo htmlentities($result->description); ?></textarea><small class="form-text text-danger help-block"></small></div>
                                </div>                           

                                <div class="control-group">
                                    <label for="image1"><strong>Header Image</strong></label>
                                

                                    <div class="form-group floating-label-form-group controls"><img src="../../uploads/News/<?php echo $id ."/". htmlentities($result->image1); ?>" width="300" height="200" style="border:solid 1px #000"><br><br>
                                        <a href="changeimage.php?imgid=<?php echo htmlentities($result->id) ?>">Change
                                            Header Image</a>
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