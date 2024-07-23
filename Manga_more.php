    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Manga Luca</title>
        <!-- css files -->
        <link rel="stylesheet" href="Mariam_Style/bootstrap.min.css">
        <link rel="stylesheet" href="Mariam_Style/css/style.css">
        <link rel="stylesheet" href="Mariam_Style/font-awesome.min.css">
        <!-- مكاتب اخرى -->
        <link rel="stylesheet" href="Mariam_Style/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
        <link rel="icon" type="image/x-icon" href="Mariam_Style/icon-temp.png">
        <style>
            /* Header Start style */
            .text {
                color: black;
                font-size: 22px;
            }

            .ml6 {
                position: relative;
                font-weight: 900;
                font-size: 3.3em;
            }

            .ml6 .text-wrapper {
                position: relative;
                display: inline-block;
                padding-top: 0.2em;
                padding-right: 0.05em;
                padding-bottom: 0.1em;
                overflow: hidden;
            }

            .ml6 .letter {
                display: inline-block;
                line-height: 1em;
            }

            .letters{               
                margin-right:722px;
            }

            @media screen and (max-width: 900px) {
                .letters {             
                    font-size: 22px;
                    margin-right:202px;
                }

                .text {
                    font-size: 18px;
                    margin-top: -36px;
                }
            }

            /* header Style End  */

            .pic-1 {
                height: 100px;
            }

            .box16 {
                margin-bottom: 20px;
            }
        </style>
    </head>

    <body>

        <!-- start navbar -->
        <?php
        // Headerاستدعاء ملف ال 
        session_set_cookie_params(0);
        session_start();
        include("Header.php");
        ?>

        <!-- النص المتحرك -->
        <div class="container mt-40" style="margin-top: 11px;">
            <h1 class="ml6">
                <span class="text-wrapper">
                <span class="letters" style="background-color: rgba(0, 0, 0, 0.516);padding: 20px;">#Manga Loca</span>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>                    
                    <script>
                        // Wrap every letter in a span
                        var textWrapper = document.querySelector('.ml6 .letters');
                        textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

                        anime.timeline({
                                loop: true
                            })
                            .add({
                                targets: '.ml6 .letter',
                                translateY: ["1.1em", 0],
                                translateZ: 0,
                                duration: 750,
                                delay: (el, i) => 50 * i
                            }).add({
                                targets: '.ml6',
                                opacity: 0,
                                duration: 1000,
                                easing: "easeOutExpo",
                                delay: 1000
                            });
                    </script>
                </span>
            </h1>

            <?php

             // <!-- كود تقسم البيانات على شكل مجموعات او صفحات -->
     
             if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
                $page_no = $_GET['page_no'];
            } else {
                $page_no = 1;
            }

            $total_records_per_page = 50;
            $offset = ($page_no - 1) * $total_records_per_page;
            $previous_page = $page_no - 1;
            $next_page = $page_no + 1;
            $adjacents = "2";

            // استعلام عرض بيانات من جدول المنشورات
            $sql1 = "SELECT * FROM `manga`";
            $stmt1 = $dbh->prepare($sql1);
            $stmt1->execute();
            $total_records = $stmt1->rowCount();

            $total_no_of_pages = ceil($total_records / $total_records_per_page);
            $second_last = $total_no_of_pages - 1;

            if ($_GET['sort'] == 'most_view') {
            ?><h3 class="text" style="text-align: right;margin-top:-62px">&#128293المانجا الاكثر مشاهدة</h3> <?php
                $sql = "SELECT manga.id,name,image1,max(chapter) as 'chapter' FROM manga,chapter where manga.id=manga GROUP BY manga.id,image1,name order by manga.view_total Desc;";
            } elseif ($_GET['sort'] == 'new') {
                ?><h3 class="text" style="text-align: right;margin-top:-62px">&#128293المانجا الاحدث اصداراً</h3> <?php
                $sql = "SELECT manga.id,name,image1,max(chapter) as 'chapter' FROM manga,chapter where manga.id=manga GROUP BY manga.id,image1,name order by chapter.date Desc;";
            } elseif ($_GET['sort'] == 'rate') {
                ?><h3 class="text" style="text-align: right;margin-top:-62px">&#128293المانجا الأعلى تقيماً</h3> <?php
                    $sql = "SELECT manga.id,name,image1,max(chapter) as 'chapter' FROM manga,chapter where manga.id=manga GROUP BY manga.id,image1,name order by chapter.rate Desc;";
                } else {
                    ?><h3 class="text" style="text-align: right;margin-top:-62px">&#128293المانجا ألأكثر انتشاراً</h3> <?php
                    $sql = "SELECT manga.id,name,image1,max(chapter) as 'chapter' FROM manga,chapter where manga.id=manga GROUP BY manga.id,image1,name;";
                }

                ?> <hr style="color: black;background-color: black;"> <div class="row"><?php               

                $query = $dbh->prepare($sql);
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_OBJ);
                if ($query->rowCount() > 0) {
                    foreach ($results as $result) { ?>
                  
                        <div class="col-md-4 col-sm-6">
                            <div class="box16">
                                <img class="pic-1" src="<?php echo "uploads/Poster/" . htmlentities($result->image1); ?>">
                                <div class="box-content">
                                    <h3 class="title"><?php echo htmlentities($result->name); ?></h3>
                                    <span class="post">Chapter <?php echo htmlentities($result->chapter); ?></span>
                                    <ul class="social">
                                        <li><a href="details.php?id=<?php echo htmlentities($result->id); ?>"><i class="fa fa-eye"></i></a></li>
                                        <li><a href="#"><i class="fa fa-download"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>                   
                
                <?php $cnt = $cnt + 1;
                            }
                        } ?>

                    </div>
        </div>  </div>

        <hr>


<!-- كود تقسم الصفحة -->
<div style='padding: 10px 20px 0;margin-top:640px;color:white'>
                   <strong>Page <?php echo $page_no . " of " . $total_no_of_pages; ?></strong>
               </div>

           </div>


           <!-- تقسيم بيانات على شكل مجموعات -->
           <nav aria-label="Page navigation example">
               <ul class="pagination justify-content-center">
                   <li <?php if ($page_no <= 1) {
                           echo "class='page-item disabled'";
                       } ?>>
                       <a class="page-link" <?php if ($page_no > 1) {
                                                   echo "href='?page_no=$previous_page'";
                                               } ?>>Previous</a>
                   </li>

                   <?php
                   if ($total_no_of_pages <= 10) {
                       for ($counter = 1; $counter <= $total_no_of_pages; $counter++) {
                           if ($counter == $page_no) {
                               echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";
                           } else {
                               echo "<li class='page-item'><a class='page-link' href='?page_no=$counter'>$counter</a></li>";
                           }
                       }
                   } elseif ($total_no_of_pages > 10) {
                       if ($page_no <= 4) {
                           for ($counter = 1; $counter < 8; $counter++) {
                               if ($counter == $page_no) {
                                   echo "<li class='page-item active'><a>$counter</a></li>";
                               } else {
                                   echo "<li class='page-item'><a class='page-link' href='?page_no=$counter'>$counter</a></li>";
                               }
                           }
                           echo "<li class='page-item'><a>...</a></li>";
                           echo "<li class='page-item'><a class='page-link' href='?page_no=$second_last'>$second_last</a></li>";
                           echo "<li class='page-item'><a class='page-link' href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
                       } elseif ($page_no > 4 && $page_no < $total_no_of_pages - 4) {
                           echo "<li class='page-item'><a class='page-link' href='?page_no=1'>1</a></li>";
                           echo "<li class='page-item'><a class='page-link' href='?page_no=2'>2</a></li>";
                           echo "<li class='page-item'><a>...</a></li>";
                           for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {
                               if ($counter == $page_no) {
                                   echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";
                               } else {
                                   echo "<li class='page-item'><a class='page-link' href='?page_no=$counter'>$counter</a></li>";
                               }
                           }
                           echo "<li class='page-item'><a>...</a></li>";
                           echo "<li class='page-item'><a href='?page_no=$second_last'>$second_last</a></li>";
                           echo "<li class='page-item'><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
                       } else {
                           echo "<li class='page-item'><a class='page-link' href='?page_no=1'>1</a></li>";
                           echo "<li class='page-item'><a class='page-link' href='?page_no=2'>2</a></li>";
                           echo "<li class='page-item'><a>...</a></li>";
                           for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
                               if ($counter == $page_no) {
                                   echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";
                               } else {
                                   echo "<li class='page-item'><a class='page-link' href='?page_no=$counter'>$counter</a></li>";
                               }
                           }
                       }
                   }
                   ?>

                   <li <?php if ($page_no >= $total_no_of_pages) {
                           echo "class='page-item disabled'";
                       } ?>>
                       <a class="page-link" <?php if ($page_no < $total_no_of_pages) {
                                                   echo "href='?page_no=$next_page'";
                                               } ?>>Next</a>
                   </li>
                   <?php if ($page_no < $total_no_of_pages) {
                       echo "<li class='page-item'><a class='page-link' href='?page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
                   } ?>
               </ul>
           </nav>
       </div>
   </article>
        <!--  </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div> -->

        <div class="container py-4" style="padding:40px;width:100%;">
            <span style="color:black" class="copyright">&copy; 2022</span>
            <span style="color:black" class="design float-left">@pr_mah99</span>
            <span style="color:black" class="design float-right">Copyright MangaLuca Team</span>
        </div>
    </body>

    </html>