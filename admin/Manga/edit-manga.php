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
        try {


            $title = $_POST['title'];
            $manga_type = $_POST['manga_type'];
            $subname = $_POST['subname'];
            $cat = $_POST['selectcat'];
            $description = $_POST['description'];
            $id = intval($_GET['id']);
            $genre = $_POST['genre'];
            $written = $_POST['written'];
            $Rate = $_POST['Rate'];
            $drawer = $_POST['drawer'];
            $state = $_POST['state']; 
            $Published = $_POST['Published']; 
            $r_age = $_POST['r_age']; 
            // كود تحديث المنشور
            // Post اسم الجدول الموجود بقاعدة البيانات 

            $sql = "UPDATE `manga` SET name=:title,subname=:subname,type=:type,Published=:Published,r_age=:r_age,drawer=:drawer,state=:state,description=:description,genre=:genre,written=:written,Rate=:Rate WHERE id=:id ";
            $query = $dbh->prepare($sql);
            // عمل براميترات لمنع اختراق الموقع
            $query->bindParam(':title', $title, PDO::PARAM_STR);
            $query->bindParam(':subname', $subname, PDO::PARAM_STR);
            $query->bindParam(':type', $manga_type, PDO::PARAM_STR);
            $query->bindParam(':state', $state, PDO::PARAM_STR);
            $query->bindParam(':drawer', $drawer, PDO::PARAM_STR);
            $query->bindParam(':description', $description, PDO::PARAM_STR);
            $query->bindParam(':id', $id, PDO::PARAM_STR);
            $query->bindParam(':genre', $genre, PDO::PARAM_STR);
            $query->bindParam(':written', $written, PDO::PARAM_STR);
            $query->bindParam(':Rate', $Rate, PDO::PARAM_STR);
            $query->bindParam(':Published', $Published, PDO::PARAM_STR);
            $query->bindParam(':r_age', $r_age, PDO::PARAM_STR);
            $query->execute();

            echo "<script>alert('Manga has updated successfully');document.location = 'manage-manga.php';</script>";
        } catch (Exception $e) {
            echo $e->getMessage();
        } catch (InvalidArgumentException $e) {
            echo $e->getMessage();
        } finally {
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

        <!-- tags المكاتب الخاصة بعرض التصنيفات بشكل  -->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/css/bootstrap-tokenfield.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/bootstrap-tokenfield.js"></script>
        <!-- انتهى  -->


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

        <header class="masthead" style="background-image:url('../assets/img/home-bg.jpg');">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-lg-8 mx-auto">
                        <div class="site-heading">
                            <a class="go">- Home -</a>
                            <h1>Edit Manga</h1><span class="subheading">Update Information</span>
                            <br><a href="manage-manga.php" class="go">- Manga -</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Header -->

        <div class="container">
            <div class="row">
                <div class="col-md-10 col-lg-8 mx-auto">
                    <h2 class="post-title">Edit a Manga</h2>
                    <br>
                    <?php
                    // كود عرض بينات المنشور
                    $id = intval($_GET['id']);
                    $sql = "SELECT * FROM manga WHERE manga.id=:id";
                    // $sql = "SELECT events.*,events_images.image1 FROM events,events_images WHERE event_id=events.id and events.id=:id";
                    $query = $dbh->prepare($sql);
                    $query->bindParam(':id', $id, PDO::PARAM_STR);
                    $query->execute();
                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                    
                    if ($query->rowCount() > 0) {
                        foreach ($results as $result) { ?>
                            <form id="contactForm" method="post" enctype="multipart/form-data">
                                <div class="control-group">
                                    <label for="title"><strong>اسم المانجا</strong></label>
                                    <div class="form-group floating-label-form-group controls"><input class="form-control" type="text" id="title" required="" placeholder="Manga Name" name="title" value="<?php echo htmlentities($result->name); ?>"><small class="form-text text-danger help-block"></small></div>
                                </div>
                                <div class="control-group">
                                    <label for="title"><strong>الاسم الثاني</strong></label>
                                    <div class="form-group floating-label-form-group controls"><input class="form-control" type="text" id="subname" required="" placeholder="الاسم الثاني" name="subname" value="<?php echo htmlentities($result->subname); ?>"><small class="form-text text-danger help-block"></small></div>
                                </div>
                                <div class="control-group">
                                    <label for="manga_type"><strong>النوع</strong></label>
                                    <div class="form-group floating-label-form-group controls"><select class="form-control" id="manga_type" required="" placeholder="Type" name="manga_type">
                                            <option value="Manga" <?php echo htmlentities($result->Type) == 'Manga' ? 'selected': '' ?>>Manga</option>
                                            <option value="Manhwa" <?php echo htmlentities($result->Type) == 'Manhwa' ? 'selected': '' ?>>Manhwa</option>
                                            <option value="Comics" <?php echo htmlentities($result->Type) == 'Comics' ? 'selected': '' ?>>Comics</option>
                                        </select><small class="form-text text-danger help-block"></small></div>
                                </div>

                                
                                <br>

                                <div class="control-group">
                                    <label for="manga_type"><strong>النوع</strong></label>
                                    <div class="form-group floating-label-form-group controls"><select class="form-control" id="state" required="" placeholder="الحالة" name="state">
                                            <option value="منتهية" <?php echo htmlentities($result->state) == 'منتهية' ? 'selected': '' ?>>منتهية</option>
                                            <option value="مُستمر" <?php echo htmlentities($result->state) == 'مُستمر' ? 'selected': '' ?>>مُستمر</option>                                          
                                        </select><small class="form-text text-danger help-block"></small></div>
                                </div>


                                <div class="form-group">
                                    <label>أختر التصنيفات </label>
                                    <input type="text" name="genre" id="genre" class="form-control" value="<?php echo htmlentities($result->genre); ?>" />
                                </div>



                                <div class="form-group">
                                    <label>ادخل اسم المؤلف </label>
                                    <input type="text" name="written" id="written" class="form-control" value="<?php echo htmlentities($result->written); ?>" />
                                </div>

                                <div class="form-group">
                                    <label>ادخل اسم الرسام</label>
                                    <input type="text" name="drawer" id="drawer" class="form-control" value="<?php echo htmlentities($result->drawer); ?>" />
                                </div>


                                <div class="form-group">
                                    <label>أدخل التقيم </label>
                                    <input type="text" name="Rate" id="Rate" class="form-control" value="<?php echo htmlentities($result->rate); ?>" />
                                </div>

                                <div class="control-group">
                                    <label for="Published"><strong>تاريخ النشر (السنة فقط)</strong></label>
                                    <div class="form-group floating-label-form-group controls"><input class="form-control" type="text" id="Published" required="" placeholder="تاريخ النشر" name="Published" value="<?php echo htmlentities($result->Published); ?>"><small class="form-text text-danger help-block"></small></div>
                                </div>

                                <div class="control-group">
                                    <label for="r_age"><strong>التصنيف العمري (من 18+)</strong></label>
                                    <div class="form-group floating-label-form-group controls"><input class="form-control" type="text" id="r_age" required="" placeholder="التصنيف العمري" name="r_age" value="<?php echo htmlentities($result->r_age); ?>"><small class="form-text text-danger help-block"></small></div>
                                </div>

                                <div class="control-group">
                                    <label for="image1"><strong>الصورة الرئيسية للمانجا</strong></label>
                                    <?php
                                    $id = intval($_GET['id']);
                                    // استعلام عرض بيانات
                                    $sql1 = "SELECT image1 FROM manga WHERE id=:id";
                                    $query = $dbh->prepare($sql1);
                                    $query->bindParam(':id', $id, PDO::PARAM_STR);
                                    $query->execute();
                                    $results_img = $query->fetchAll(PDO::FETCH_OBJ);
                                    // اذا توفرت بيانات قم بعرضها
                                    if ($query->rowCount() > 0) {
                                        foreach ($results_img as $results_img) {
                                    ?><?php }
                                    } ?>


                                    <div class="form-group floating-label-form-group controls"><img src="../../uploads/Poster/<?php echo htmlentities($results_img->image1); ?>" width="300" height="200" style="border:solid 1px #000"><br><br>
                                        <a href="changeimage.php?imgid=<?php echo htmlentities($result->id) ?>">Change
                                            Header Image</a>
                                        <small class="form-text text-danger help-block"></small>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label for="desc_en"><strong>Description</strong></label>
                                    <div class="form-group floating-label-form-group controls mb-3"><textarea class="form-control" id="desc" data-validation-required-message="Description" required="" placeholder="Description" rows="5" name="description"><?php echo htmlentities($result->description); ?></textarea><small class="form-text text-danger help-block"></small></div>
                                </div>

                        <?php }
                    } ?>

                        <div class="form-group">
                            <button class="btn btn-primary" type="submit" name="submit" id="submit">Update</button>
                        </div>
                            </form>
                </div>
            </div>
        </div>
        <hr><br>

    </body>

    </html>

    <!-- اكواد العرض التصنيفات -->

    <script>
        $(document).ready(function() {

            $('#genre').tokenfield({
                autocomplete: {
                    source: ['كوميديا', 'فنتازيا' , 'مغامرة', 'فنون قتال', 'رعب', 'اكشن', 'شونين', 'سينين', 'مدرسي', 'دراما', 'خيال', ' إنتقام', 'العاب', 'تاريخي', 'طبخ', 'سحر', 'غموض', 'عائلي', 'عنف' , 'ذكاء' , 'جريمة'],
                    delay: 100
                },
                showAutocompleteOnFocus: true
            });
        });
    </script>


<?php } ?>