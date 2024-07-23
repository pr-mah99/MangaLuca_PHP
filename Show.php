        <!-- في حالة لم يتم اختيار مانجا فانة يرجع الى القائمة الرئيسية -->
        <?php
        session_set_cookie_params(0);
        session_start();
        include("Header.php");

        if (intval($_GET['id']) == 0) {
            // افتح الصفحة التالية
            echo "<script>alert('لايوجد فصل اخر'');</script>";
            header('location: index.php');
        } else {


        ?>

            <?php

            // <!-- كود اضافة تعليق انتهى -->

            // المتغيرات الرئيسية


            // أستدعاء كود اتصال بقاعدة البيانات
            // include('config.php');

            $manga = intval($_GET['id']);
            $chapter = intval($_GET['ch']);
            $name = $_GET['name'];
            $userid = $_SESSION['login_userid_manga'];



            if (strlen($_SESSION['login_userid_manga']) == 0) {
                // اذا لم يسجل دخول فلا تسجل مشاهدات المانجا 


            } else {

                // كود تحديث المشاهدات المانجا 

                try {
                    $sql2 = "SELECT date FROM chapter_view WHERE user=:userid and manga=:manga and chapter=:chapter";
                    $query2 = $dbh->prepare($sql2);
                    $query2->bindParam(':manga', $manga, PDO::PARAM_STR);
                    $query2->bindParam(':chapter', $chapter, PDO::PARAM_STR);
                    $query2->bindParam(':userid', $userid, PDO::PARAM_STR);
                    $query2->execute();
                    // $results3 = $query2->fetchAll(PDO::FETCH_OBJ);          
                    if ($query2->rowCount() > 0) {

                        //  اذا هذا شخص شاهد المانجا من قبل ف حدث وقت المشاهدة فقط 
                        // $date->format('d-m-Y H:i:s a');
                        $date = date("Y-m-d H:i:s");
                        // كود تحديث اخر وقت للمشاهدة
                        $sql = "update chapter_view set date=:date WHERE user=:userid and manga=:manga and chapter=:chapter";
                        $query = $dbh->prepare($sql);
                        $query->bindParam(':date', $date, PDO::PARAM_STR);
                        $query->bindParam(':manga', $manga, PDO::PARAM_STR);
                        $query->bindParam(':chapter', $chapter, PDO::PARAM_STR);
                        $query->bindParam(':userid', $userid, PDO::PARAM_STR);
                        // تنفيذ الاستعلام

                        $query->execute();
                    } else {

                        // استعلام ادخال بيانات الى جدول المنشورات
                        $sql = "INSERT INTO chapter_view(user,manga,chapter) VALUES(:userid,:manga,:chapter)";
                        $query = $dbh->prepare($sql);
                        $query->bindParam(':manga', $manga, PDO::PARAM_STR);
                        $query->bindParam(':chapter', $chapter, PDO::PARAM_STR);
                        $query->bindParam(':userid', $userid, PDO::PARAM_STR);
                        // تنفيذ الاستعلام

                        $query->execute();
                        // $lastInsertId = $dbh->lastInsertId();
                        // echo "<script>alert('$userid');</script>";

                    }
                } catch (Exception $e) {
                    echo $e->getMessage();
                } catch (InvalidArgumentException $e) {
                    echo $e->getMessage();
                }
            }
            ?>
            <!-- كود تحديث المشاهدات المانجا انتهى -->




            <!DOCTYPE html>
            <html>

            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>مانجا لوكا : <?php echo $name ?></title>
                <style>
                    /* Show Menu Chpater Start */


                    body{
                        overflow-x: hidden;
                    }

                    /* img {
                    box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;
                } */

                    @media screen and (max-width: 1600px) {

                        /* .navbar2 navbar-expand-lg navbar2-light shadow py-2 py-sm-0{
                        margin-left:-42px
                    }
                    */
                        .navbar2 {
                            /* padding-left: 50px; */
                            color: black;
                        }

                        .navbar2 .container-fluid2 {
                            /* background-color: blue; */
                            margin-left: 25%;
                            margin-bottom: 0px;
                        }

                        .navbar2 {
                            font-size: 22px;
                            text-align: center;
                            padding: 40px;
                            margin-right: 90px;
                            margin-left: 90px;

                        }

                        .select1 {
                            margin-top: -70px;
                            margin-left: -10px;
                            /* font-size: 22px; */
                            padding-right: 10px;
                            width: 200px;
                            padding-left: 55px;
                        }
                    }

                    @media screen and (max-width: 700px) {

                        #foo {
                            text-align: center;
                            width: 120px;
                            font-size: 20px;
                            font-weight: 400;
                        }

                        .navbar2 .container-fluid2 {
                            margin-left: 0%;

                            /* margin-bottom: -22px; */
                        }

                        .navbar2 {
                            font-size: 22px;
                            text-align: center;
                            padding: 40px;
                            margin-right: 90px;
                            margin-left: 90px;
                            margin-bottom: 20px;

                        }

                        .select1 {
                            margin-top: -70px;
                            margin-left: -10px;
                            /* font-size: 22px; */
                            padding-right: 10px;
                            width: 250px;
                            padding-left: 15px;
                            margin-bottom: 20px;
                        }

                    }

                    /* Show Menu Chpater End */

                </style>

            </head>

            <body>









                <?php $x = intval($_GET['id']);
                $ch = intval($_GET['ch']);

                ?>


                <!-- Show Menu Chpater HTML -->
                <nav class="navbar2 navbar-expand-lg navbar2-light shadow py-2 py-sm-0">
                    <div class="collapse navbar-collapse"></div>
                    <div class="container-fluid2">
                        <div class="row py-3">
                            <div class="col-lg-8 col-sm-2 mb-3 mb-sm-0">
                                <ul class="navbar-nav mr-auto">
                                    <!-- always use single word for li -->
                                    <li class="nav-item">
                                        <?php
                                        if (intval($_GET['ch']) == 1) {
                                        ?> <a class="nav-link" id='foo' href="#" style="margin-right: 15px;color:gray;" title="هذا اول صفحة من  الفصل ولايوجد فصل قبلة">الفصل السابق</a><?php
                                                                                                                                                                                    } else {
                                                                                                                                                                                        ?> <a class="nav-link" id='foo' onclick="min_chapter();" href="Show.php?id=<?php echo $x ?>&ch=<?php echo $ch - 1 ?>&name=<?php echo $_GET['name'] ?>" style="margin-right: 15px;">الفصل السابق</a><?php
                                                                                                                                                                                                                                                                                                                                                                                        }
                                                                                                                                                                                                                                                                                                                                                                                            ?>
                                    </li>
                                    <li class="nav-item active">
                                        <a class="nav-link" style="font-weight: bolder;" href="#">الفصل <?php echo intval($_GET['ch']) ?></a>
                                        <!-- <p class="pp">: أختر الفصل</p>   --> <br><br>
                                        <div class="control-group">
                                            <div class="form-group floating-label-form-group controls">
                                                <div class="control-group">
                                                    <div class="form-group floating-label-form-group controls">
                                                        <?php

                                                        $id = intval($_GET['id']);
                                                        $query = "SELECT `chapter` FROM `chapter` WHERE manga=$id ";
                                                        // $query->bindParam(':id', $id, PDO::PARAM_STR);                          
                                                        $result = $conn->query($query);
                                                        if ($result->num_rows > 0) {
                                                            $options = mysqli_fetch_all($result, MYSQLI_ASSOC);
                                                        }
                                                        ?>
                                                        <form method="post" style="margin-top: -42px;">
                                                            <select id="numb" class="form-control" name="selectcat" required>
                                                                <!--Option في هذا القسم نستدعي الفصول من جدول الخاص بها ونعرضها بداخل -->
                                                                <?php
                                                                // افحص وجود قيمة GET للمتغير ch
                                                                $defaultCh = isset($_GET['ch']) ? $_GET['ch'] : '1';

                                                                echo '<option value="1" ' . ($defaultCh === '1' ? 'selected' : '') . '>: أختر الفصل</option>';

                                                                foreach ($options as $option) {
                                                                    $optionValue = $option['chapter'];
                                                                    echo '<option value="' . $optionValue . '" ' . ($defaultCh === $optionValue ? 'selected' : '') . '>' . $optionValue . '</option>';
                                                                }
                                                                ?>
                                                            </select>




                                                            <!-- <input type="submit" class="form-control" name="submit" value="اختيار">
                                                        </form> -->
                                                    </div>
                                                </div>
                                    </li>
                                    <li class="nav-item">
                                        <!-- الكود التالي هو جلب اخر فصل ومقارنتة مع الفصل الحالي في حالة التساوي يعطل الانتقال الى الفصل التالي وغير ذلك يزيد من عدد الفصل بمقدار 1 -->
                                        <?php
                                        $id = intval($_GET['id']);
                                        $query = "SELECT max(chapter) as 'chapter' FROM `chapter` WHERE manga=$id";
                                        $result = $conn->query($query);
                                        if ($result->num_rows > 0) {
                                            $options = mysqli_fetch_all($result, MYSQLI_ASSOC);
                                            foreach ($options as $option) {
                                                $cx = $option['chapter'];
                                            }
                                        }
                                        // في حالة كان الفصل الاخير 
                                        if (intval($_GET['ch']) == $cx) {
                                        ?> <a class="nav-link" style="color:gray;" title="هذا هو الفصل الاخير من المانجا حالياً" href="#" onclick="plus_chapter();">الفصل التالي</a><?php
                                                                                                                                                                                }
                                                                                                                                                                                // في حالة كان هنالك فصل اخر من المانجا
                                                                                                                                                                                else {
                                                                                                                                                                                    $x = intval($_GET['id']);
                                                                                                                                                                                    ?> <a class="nav-link" href="Show.php?id=<?php echo $x ?>&ch=<?php echo $ch + 1 ?>&name=<?php echo $_GET['name'] ?>" onclick="plus_chapter();">الفصل التالي</a><?php
                                                                                                                                                                                                                                                                                                                                                }
                                                                                                                                                                                                                                                                                                                                                    ?>



                                        <?php  ?>

                                    </li>






                                </ul>
                            </div>

                        </div>
                    </div>
                    </div>

                </nav>
                <!-- Show Menu Chpater HTML End -->


                <!-- php code Start-->


                <!-- -------------------------------------------------------------- -->

           
       

                <!-- pathكود جلب ال -->
                <?php
                $id = intval($_GET['id']);

                // كود عرض الصور من المجلد
                $ch = intval($_GET['ch']);

                // $p = intval($_GET['p']);

                // كود عرض الصور 
                $path = $id . '/' . $ch . '/';
                // فقط صيغة jpg
                // $images = glob($path."*.jpg");   
                // كل صيغ الصور

                $fullpath = 'uploads/Manga/' . $path;
                $images = glob('uploads/Manga/' . $path . "/" . "*");

                $count = count($images) - 1;

                for ($i = 0; $i <= $count; $i++) {
                    $img = $fullpath . $i . '.jpg';
                    // echo  'w ' . $fullpath . $i .'.jpg';
                    echo "<div class='image'><center><img src='$img' class='nav-link' 
                    style='margin-bottom: 8px; max-width: 100%;' />
                    <h5>$count/$i</h5>
                    </center><br/></div>";
                }


                // $oneHourAgo= date('Y-m-d H:i:s', strtotime('-1 hour'));
                // echo 'One hour ago, the date = ' . $oneHourAgo;


                // كود عرض الصور انتهى 

                ?>
       
             

                <!-- -------------------------------------------------------------- -->

                <script>
                    // استدعاء الدالة عند تغيير قيمة الـ <select>
                    document.getElementById("numb").addEventListener("change", function() {
                        // الحصول على قيمة الـ <select>
                        var selectedValue = this.value;

                        var name = "<?php echo $_GET['name']; ?>";

                        // تحويل الصفحة إلى الرابط الجديد بعد تغيير القيمة
                        window.location.href = "Show.php?id=<?php echo $x ?>&ch=" + selectedValue + "&name=" + name;
                    });
                </script>


                </div>

                </div>

                </article>


            </body>

            </html>

        <?php } ?>