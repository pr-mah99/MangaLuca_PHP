  <!-- start navbar -->
  <?php
        // Headerاستدعاء ملف ال 
        include("Header.php");
        ?>
        <!-- end navbar-->
<?php
if (intval($_GET['id']) == 0) {
    // افتح الصفحة التالية
    header('location: index.php');
} else {
    session_set_cookie_params(0);
    session_start();
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>مانجا لوكا : Manga Luca</title>

        <!-- css files -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css"> -->
        <link rel="stylesheet" href="css/main.css">
        <style>
            #bookmark_t i {
                cursor: pointer;
                color: red;
                transition: 1s;
            }

            #bookmark_t i:hover {
                color: black;
                padding: 5px;
                box-shadow: rgba(3, 102, 214, 0.3) 0px 0px 0px 3px;
            }

            #bookmark_t i:active {
                color: yellow;
            }

            #bookmark_f i {
                cursor: pointer;
                color: black;
                transition: 1s;
            }

            #bookmark_f i:hover {
                color: red;
                padding: 5px;
                box-shadow: rgba(3, 102, 214, 0.3) 0px 0px 0px 3px;
            }

            #bookmark_f i:active {
                color: brown;
            }
        </style>
    </head>

    <body>

      


        <div class="container my-5"></div>
        <div class="read-intro bg-light">
            <!-- start reading intro -->
            <!-- code php  -->
            <?php



            // <!-- كود اضافة تعليق -->

            if (isset($_POST['submit'])) {
                // تعريف متغيرات اعمدة الجدول

                // أستدعاء كود اتصال بقاعدة البيانات
                // include('config.php');
                if (strlen($_SESSION['login_userid_manga']) == 0) {
                    echo "<script>alert('You Have To Login');document.location = 'admin/admin.php';</script>";
                } else {
                    try {
                        $user_id = strlen($_SESSION['login_userid_manga']);
                        $comment = $_POST['comment'];
                        $postid = intval($_GET['id']);
                        $st1 = 'Manga';
                        $sql = "INSERT INTO comments(`m_c_d`,`user_id`,`comment`,`type`) VALUES(:postid,:user_id,:comment,:st1)";
                        $query = $dbh->prepare($sql);
                        $query->bindParam(':postid', $postid, PDO::PARAM_STR);
                        $query->bindParam(':user_id', $user_id, PDO::PARAM_STR);
                        $query->bindParam(':comment', $comment, PDO::PARAM_STR);
                        $query->bindParam(':st1', $st1, PDO::PARAM_STR);
                        $query->execute();
                        $lastInsertId = $dbh->lastInsertId();
                        if ($lastInsertId) {
                            echo "<script>alert('تم الارسال بنجاح');</script>";
                        } else {
                            echo "<script>alert('حدث خطا ما , اعد المحاولة');</script>";
                        }
                    } catch (PDOException $e) {
                        echo $sql . "<br>" . $e->getMessage();
                    }
                }
            }


            // <!-- كود اضافة تعليق انتهى -->



            // joinاستعلام عرض بيانات من جدول المنشورات وجدول المناطق بستخدام ال
            $id = intval($_GET['id']);
            $sql = "SELECT * FROM manga where id=$id;";
            $query = $dbh->prepare($sql);
            // تنفيذ الاستعلام
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_OBJ);
            // 0 اذا كانت البيانات اكثر من 
            if ($query->rowCount() > 0) {
                // foreach ف بستخدام 
                // ليتم عرض بيانات على شكل بيانات
                foreach ($results as $result) {


                    // كود تحديث المشاهدات المانجا 

                    try {

                        $max = 1;
                        $id = htmlentities($result->id);
                        $sqlview = "SELECT view_total FROM manga WHERE id=:id";
                        $query2 = $dbh->prepare($sqlview);
                        $query2->bindParam(':id', $id, PDO::PARAM_STR);
                        $query2->execute();
                        $results3 = $query2->fetchAll(PDO::FETCH_OBJ);
                        foreach ($results3 as $result3) {
                            $view = htmlentities($result3->view_total);
                            $max = (int)$view + 1;
                        }

                        // كود تحديث
                        $sql = "UPDATE `manga` SET view_total=:maxview WHERE id=:id ";
                        $query = $dbh->prepare($sql);
                        // عمل براميترات لمنع اختراق الموقع
                        $query->bindParam(':maxview', $max, PDO::PARAM_STR);
                        $query->bindParam(':id', $id, PDO::PARAM_STR);
                        $query->execute();
                    } catch (Exception $e) {
                        echo $e->getMessage();
                    } catch (InvalidArgumentException $e) {
                        echo $e->getMessage();
                    }



                    $user = $_SESSION['login_userid_manga'];
                    $manga = intval($_GET['id']);
                    // كود حفظ المانجا في المفضلة  


                    if (isset($_REQUEST['add_favorite'])) {

                        $sql = "INSERT INTO favorite(manga,userid) VALUES(:manga,:user)";
                        $query = $dbh->prepare($sql);
                        $query->bindParam(':user', $user, PDO::PARAM_STR);
                        $query->bindParam(':manga', $manga, PDO::PARAM_STR);
                        $query->execute();
                        echo "<script>alert('تم اضافة المانجا الى المفضلة بنجاح');document.location = 'details.php?id=$manga';</script>";
                    }

                    if (isset($_REQUEST['remove_favorite'])) {

                        $sql = "DELETE FROM favorite WHERE manga=:manga and userid=:user";
                        $query = $dbh->prepare($sql);
                        $query->bindParam(':user', $user, PDO::PARAM_STR);
                        $query->bindParam(':manga', $manga, PDO::PARAM_STR);
                        $query->execute();

                        echo "<script>alert('تم أزالة المانجا من المفضلة بنجاح');document.location = 'details.php?id=$manga';</script>";
                    }

                    // كود حفظ المانجا في المفضلة انتهى
                    // اذا تم تسجيل الدخول 
                    if (strlen($_SESSION['login_userid_manga']) == 0) {


            ?> <a href="admin/admin.php"> <i class="far fa-bookmark fa-3x" aria-hidden="true"></i>&nbsp;</a>
                        <?php



                    } else {

                        // اكواد المفضلة 


                        $sqlview = "SELECT manga FROM favorite WHERE manga=:manga and userid=:user";
                        $query2 = $dbh->prepare($sqlview);
                        $query2->bindParam(':user', $user, PDO::PARAM_STR);
                        $query2->bindParam(':manga', $manga, PDO::PARAM_STR);
                        $query2->execute();
                        if ($query2->rowCount() > 0) {




                            // اكواد المفضلة انتهى 
                        ?>
                            <!-- كود تحديث المشاهدات المانجا انتهى -->



                            <a href="details.php?id=<?php echo $manga ?>&remove_favorite=<?php echo $manga ?>" id="bookmark_t"> <i class="far fa-bookmark fa-3x" aria-hidden="true"></i>&nbsp;</a>

                        <?php  } else { ?>


                            <a href="details.php?id=<?php echo $manga ?>&add_favorite=<?php echo $manga ?>" id="bookmark_f"> <i class="far fa-bookmark fa-3x" aria-hidden="true"></i>&nbsp;</a>

                    <?php }
                    }

                    ?>

                    <div class="row">
                        <div class="cover col-*">
                            <h3 class="head">مانجا <?php echo htmlentities($result->subname); ?> مترجمة</h3>
                            <img class="shadow" style="margin-left: -22px;" src="uploads/Poster/<?php echo htmlentities($result->image1); ?>" alt="" width="300px">
                        </div>
                        <div class="info col">
                            <h2 class="head"><?php echo htmlentities($result->name) . ' / ' . htmlentities($result->subname); ?></h2>
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th scope="row">التصنيف:</th>
                                        <td>

                                            <?php

                                            //  تحويل مصفوفة الى روابط
                                            // كود تحويل المصفوفة او النص يحتوي على فوارز وتجزئتهن
                                            $str = htmlentities($result->genre);
                                            $i = 0;
                                            $new = str_getcsv($str, ",", "", ",");
                                            //  echo "<pre>";
                                            //  print_r($new);
                                            // كود تحويل المصفوفة او النص يحتوي على فوارز وتجزئتهن


                                            for ($i = 0; $i < count($new); $i++) {
                                                echo sprintf('<a href="Genre.php?s=%1$s">%1$s </a> &nbsp;', (string)$new[$i]);
                                            }
                                            //  تحويل مصفوفة الى روابط

                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">المؤلف:</th>
                                        <td><?php echo htmlentities($result->written); ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">الرسام:</th>
                                        <td><?php echo htmlentities($result->drawer); ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">النوع:</th>
                                        <td><?php echo htmlentities($result->Type); ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">المشاهدات:</th>
                                        <td><?php echo htmlentities($result->view_total); ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">التقيم:</th>
                                        <td><?php echo htmlentities($result->rate); ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">تاريخ الاضافة:</th>
                                        <td><?php echo htmlentities($result->creationdate); ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">تقيم لوكا:</th>
                                        <td><i class="fa fa-star fa-2x"></i><i class="fa fa-star fa-2x"></i><i class="fa fa-star fa-2x"></i><i class="fa fa-star fa-2x"></i><i class="fa fa-star-half-alt fa-2x"></i> <span class="font-weight-bold ml-3">(10/9)</span></td>
                                    </tr>
                                </tbody>
                            </table>
                            <p style=" direction: rtl;
            text-align: justify;">
                                <?php echo htmlentities($result->description); ?>.
                            </p>
                        </div>
                    </div>

                    <!-- الاول انتهى  -->



                    <!-- الكود الاول انتهى مرة ثانية -->

                    <div class="row">

                        <a class="btn btn-red my-3 mx-1 px-4" href="#">أبدأ بقراءة الفصل الاول</a>
                    </div>

            <?php }
            } ?>

        </div>
        </div>
        <!-- end reading intro -->

        <!-- start intro lists -->

        <div class="container my-5 bg-white" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
            <div class="intro-lists">
                <div class="head-list row bg-light">
                    <ul class="list-unstyled list-inline">
                        <li class="list-inline-item"><a data-toggle="tab" class="active" href="#ch">Ch.</a></li>
                    </ul>
                </div>
                <div class="tab-content">

                    <table class="table table-striped" style="width: 100%;">
                        <tbody>
                            <tr>
                                <th>عنوان الفصل</th>
                                <th>تاريخ النشر</th>
                            </tr>

                            <!-- code php  -->
                            <?php



                            // joinاستعلام عرض بيانات من جدول المنشورات وجدول المناطق بستخدام ال
                            $id = intval($_GET['id']);
                            $sql = "SELECT chapter.*,manga.name FROM chapter,manga where manga.id=manga and manga=$id ORDER BY date DESC;";
                            $query = $dbh->prepare($sql);
                            // تنفيذ الاستعلام
                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                            // 0 اذا كانت البيانات اكثر من 
                            if ($query->rowCount() > 0) {
                                // foreach ف بستخدام 
                                // ليتم عرض بيانات على شكل بيانات
                                foreach ($results as $result) {

                            ?>
                                    <!-- start ch -->
                                    <div id="ch" class="tab-pane fade in active show">
                                        <div class="row">
                                            <tr style="box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;">
                                                <td><a href="Show.php?id=<?php echo htmlentities($result->manga); ?>&ch=<?php echo htmlentities($result->chapter); ?>&name=<?php echo htmlentities($result->name); ?>">
                                                        <font color="black">#<?php echo htmlentities($result->chapter) . ' '; ?> </font> <?php echo htmlentities($result->title) ?>
                                                    </a></td>

                                                <?php
                                                $a = date('M d, Y'); //تاريخ اليوم
                                                $b = date('M d, Y', strtotime(htmlentities($result->date)));
                                                if ($a == $b) { //new في حالة تطابق التاريخ اضافة الفصل مع تاريخ اليوم اطبع كلمة 
                                                ?> <td> New &#128293;</td><?php

                                                                        } else {
                                                                            ?> <td> <?php echo $b ?></td><?php
                                                                                                                }
                                                                                                                    ?>

                                                <!-- <td class="text-muted text-uppercase float-right">8 hours ago</td> -->
                                            </tr>
                                        </div>
                                    </div>
                                    <!-- end ch -->


                            <?php }
                            } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        </div>

        </article>





    </body>
    <?php
    // Footerاستدعاء ملف ال 
    include("Footer.php");
    ?>

    </html>


<?php } ?>