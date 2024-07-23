<?php
session_set_cookie_params(0);
session_start();
error_reporting(0);
include('../config.php');
if (strlen($_SESSION['login']) == 0) {
    header('location: ../admin.php');
} else {


    $chapter = $_GET['ch'];
    $manga = $_GET['manga_id'];
    $isUpload = false;

    // Function to delete all files in a directory
function deleteAllFilesInDirectory($directory)
{
    $files = glob($directory . '/*'); // Get all file names
    foreach ($files as $file) { // Loop through the file list
        if (is_file($file)) {
            unlink($file); // Delete the file
        }
    }
}



   // Initialize the uploaded and remaining images counters
    $uploadedCount = 0;
    $remainingCount = 0;


    // update عند الضغط على زر 
    if (isset($_POST['update'])) {

        // انشاء مجلد باسم رقم المانجا 

        try {
            // run your code here
          
            $finall = "../../uploads/Manga/";
            $mypath = $finall . $manga . '/' . $chapter . '/';

            deleteAllFilesInDirectory($mypath);    

            mkdir($mypath, 0777, TRUE);
            chmod($mypath, 0777);
               

              // Count total files
            $countfiles = count($_FILES['file']['name']);   
            $remainingCount = $countfiles;

            $isUpload = true;

            // Looping all files
            for ($i = 0; $i < $countfiles; $i++) {
                $sourceImagePath = $_FILES["file"]["tmp_name"][$i];
                $uploadedImagePath = $mypath . $i .'.jpg';

                // Move the uploaded image to the specified directory
                if (move_uploaded_file($sourceImagePath, $uploadedImagePath)) {
                    $uploadedCount++;
                    $remainingCount--; // Decrement the remaining count
                } else {
                    $isUpload = false;
                    break; // Stop the loop if any upload fails
                }
            }


            $sql = "UPDATE `chapter` SET papers=:count WHERE chapter=:chapter and manga=:manga";
            $query = $dbh->prepare($sql);
            // عمل براميترات لمنع اختراق الموقع      
            $query->bindParam(':count', $countfiles, PDO::PARAM_STR);
            $query->bindParam(':chapter', $chapter, PDO::PARAM_STR);
            $query->bindParam(':manga', $manga, PDO::PARAM_STR);
            $query->execute();

            $isUpload = false;

            echo "<script>alert('تم حفظ الصور في قاعدة البيانات بنجاح');</script>";
        } catch (Exception $e) {
            echo "<script>alert('$e');</script>";
            echo $e->getMessage();
        } catch (InvalidArgumentException $e) {
            echo $e->getMessage();
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

        <header class="masthead" style="background-image:url('../assets/img/home-bg.jpg');">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-lg-8 mx-auto">
                        <div class="site-heading">
                            <a href="manage-chapter.php" class="go">- Home -</a>
                            <h1>Post Image</h1><span class="subheading">Update Header Photo</span>
                            <br><a href="manage-chapter.php" class="go">- Manga -</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Header -->
        <center>

        <a href="changeimage.php?ch=<?php echo htmlentities($chapter + 1) ?>&manga_id=<?php echo htmlentities($manga) ?>">الفصل التالي</a> 
        /
        <a href="changeimage.php?ch=<?php echo htmlentities($chapter - 1) ?>&manga_id=<?php echo htmlentities($manga) ?>">الفصل السابق</a>

        <hr>

        <?php 
        
        $sql = "SELECT id as 'ch_id' FROM chapter WHERE manga=:manga and chapter=:chapter";
                    // $sql = "SELECT events.*,events_images.image1 FROM events,events_images WHERE event_id=events.id and events.id=:id";
                    $query = $dbh->prepare($sql);
                    $query->bindParam(':chapter', $chapter, PDO::PARAM_STR);
                    $query->bindParam(':manga', $manga, PDO::PARAM_STR);
                    $query->execute();
                    $results = $query->fetchAll(PDO::FETCH_OBJ);       
                    if ($query->rowCount() > 0) {
                        foreach ($results as $result) { ?>


            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-lg-8 mx-auto">
                        <center>
                            <p>يرجى تحديد كل الصور في وقت واحد</p>
                        </center>

                        <h2 class="post-title">رفع صور المفصل</h2>

                        <hr>

                        <h6>أجمالي الصور الموجودة في الفصل حالياً</h6>

                        <?php
                        $folderPath = '../../uploads/Manga/' . $manga . '/' .$chapter . '/'; // تغيير هذا المسار إلى المجلد المراد البحث فيه

                        // البحث عن الملفات الموجودة في المجلد بصيغة الصور المدعومة (مثل jpg أو png أو gif)
                        $images = glob($folderPath . "*.jpg"); // يمكنك إضافة أشكال الصور الأخرى إن كنت بحاجة إليها

                        // عدد الصور الموجودة في المجلد
                        $numberOfImages = count($images);

                        echo "عدد الصور الموجودة في المجلد: " . $numberOfImages;
                        ?>


                        <hr>


                        <h4 class="post-title">
                            <?php
                            echo 'manga : ' .   $manga;
                            ?>
                        </h4>

                        <h4 class="post-title">
                            <?php
                            echo 'chapter : ' .  $chapter;
                            ?>
                        </h4>
                               
                                  

                        <br>
                        <form method='post' action='' enctype='multipart/form-data'>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">حدد الصور<span style="color:red">*</span></label>
                                <div class="col-sm-8">
                                    <input type="file" name="file[]" id="file" multiple required>
                                </div>
                            </div>
                            <div class="hr-dashed"></div>
                            <div id="success"></div>

                            <?php
                            if ($isUpload == false) {
                            ?>

                                <div class="form-group">
                                    <button class="btn btn-primary" id="sendMessageButton" type="submit" name="update">Upload All
                                    </button>
                                </div>
                                <?php } else { ?>
                                <label for="">
                                    <?php
                                    echo 'الرفع : ' . $uploadedCount . '/' . $countfiles;
                                    echo '<br>';
                                    echo 'المتبقي : ' . $remainingCount . '/' . $countfiles;
                                    ?>
                                </label>
                            <?php } ?>
                        </form>
                    </div>
                </div>
            </div>

            <?php }}else{

                ?>
                
                <div class="container">
                    <h4>ليس هناك فصل</h4>
                </div>

                <?php
        
            } ?>


            <hr><br>
        </center>
        <!-- Footer -->
        <?php include 'includes/footer.php'; ?>

        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/clean-blog.js"></script>
    </body>

    </html>

<?php } ?>