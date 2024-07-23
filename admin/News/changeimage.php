<?php

use Google\Service\Script;

session_set_cookie_params(0);
session_start();
error_reporting(0);
include('../config.php');
if (strlen($_SESSION['login']) == 0) {
    header('location: ../admin.php');
} else {
  
    if(isset($_POST['update'])){
          // Count total files
        $countfiles = count($_FILES['file']['name']);
        $id = intval($_GET['imgid']);  
        try{       

            // كود حذف بيانات من المجلد
            // بحسب رقم الخبر
            $files = glob('../../uploads/News/'.$id.'/*'); //get all file names
            foreach($files as $file){
                if(is_file($file))
                unlink($file); //delete file
            }


  // كود انشاء مجلد
  mkdir("../../uploads/News/".$id);


         // Looping all files
         for($i=0;$i<$countfiles;$i++){   
       
            
            // نقل الملفات
            $temp = explode(".", $_FILES["file"]["name"][$i]);         
            $newfilename = date('Y-m-d-H-i-s').' - '. rand() . '.' . end($temp);
            move_uploaded_file($_FILES["file"]["tmp_name"][$i], "../../uploads/News/" .$id ."/". $newfilename);            
            
            //   تغير اسم الملف قبل الرفع


            // كود اضافة البيانات
            
            $sql_add = "update news set image1=:image1 where id=:id";
            $query_add = $dbh->prepare($sql_add);
            $query_add->bindParam(':image1', $newfilename, PDO::PARAM_STR);
            $query_add->bindParam(':id', $id, PDO::PARAM_STR);
            // تنفيذ الاستعلام
            $query_add->execute();             
               
             
             }   
        }
        catch (Exception $e) {
            echo $e->getMessage();
        }
        catch (InvalidArgumentException $e) {
            echo $e->getMessage();         
        }
        finally{
           
        }
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
        <link rel="stylesheet" href="../../css/style.css">      
    </head>

    <body>

        <header class="masthead" style="background-image:url('../assets/img/home-bg.jpg');">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-lg-8 mx-auto">
                        <div class="site-heading">
                            <a>- Home -</a>
                            <h1>Event Image</h1><span class="subheading">Update Header Photo</span>
                            <br><a href="manage-news.php" class="go">- Edit News -</a>
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
                        $sql = "SELECT image1 FROM news WHERE id=:id";
                        $query = $dbh->prepare($sql);
                        $query->bindParam(':id', $id, PDO::PARAM_STR);
                        $query->execute();
                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                        if ($query->rowCount() > 0) {
                            foreach ($results as $result) { ?>
                                <!-- كود HTML -->
                               
                                    <div class="col-sm-8">
                                       <p> <?php echo htmlentities($result->image1); ?> : اسم الصورة </p>
                                        <img src="../../uploads/News/<?php echo $id . "/" . htmlentities($result->image1); ?>" width="400" style="border:solid 1px #000">
                                    </div>
                            <?php }
                        } ?>

                            <br>
                            <form method='post' action='' enctype='multipart/form-data'>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Upload New Header Image 1<span style="color:red">*</span></label>
                                <div class="col-sm-8">                     
                                        Select Image Files to Upload:
                                        <input type="file" name="file[]" id="file" multiple>                                                                                                 
                                </div>
                            </div>
                            <div class="hr-dashed"></div>
                            <div id="success"></div>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit" name="update">Update
                                </button>
                            </div>
                            </form>
                    </div>
                </div>
            </div>
            <hr><br>
        </center>
        <!-- Footer -->   

        <script src="../assets/js/jquery.min.js"></script>
        <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="../assets/js/clean-blog.js"></script>

    
    </body>

    </html>

<?php } ?>