<?php
     session_set_cookie_params(0);
     session_start();       
?>
<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- css Slider Start  -->
    <link rel="stylesheet" href="Slider/TEXT.css">
    <!-- css Sliser End  -->

    <title>Manga Luca - مانجا لوكا</title>
    <style>
        /* تنسيقات الجدول */
@charset "UTF-8";
@import url(https://fonts.googleapis.com/css?family=Open+Sans:300,400,700);

body {
  font-family: 'Open Sans', sans-serif;
  font-weight: 300;
  line-height: 1.42em;
  color:#A7A1AE;
  background-color:#1F2739;
}

h1 {
  font-size:3em; 
  font-weight: 300;
  line-height:1em;
  text-align: center;
  color: #4DC3FA;
}

h2 {
  color: #FB667A;
}

h2 a {
  font-weight: 700;
  text-transform: uppercase;
  color: #FB667A;
  text-decoration: none;
}

.blue { color: #185875; }
.yellow { color: #FFF842; }

.container th h1 {
    font-weight: bold;
    font-size: 1em;
  text-align: left;
  color: #185875;
}

.container td {
    font-weight: normal;
    font-size: 1em;
  -webkit-box-shadow: 0 2px 2px -2px #0E1119;
     -moz-box-shadow: 0 2px 2px -2px #0E1119;
          box-shadow: 0 2px 2px -2px #0E1119;
}

.container {
    text-align: left;
    overflow: hidden;
    width: 80%;
    margin: 0 auto;
  display: table;
  padding: 0 0 8em 0;
}

.container td, .container th {
    padding-bottom: 2%;
    padding-top: 2%;
  padding-left:2%;  
}

/* Background-color of the odd rows */
.container tr:nth-child(odd) {
    background-color: #323C50;
}

/* Background-color of the even rows */
.container tr:nth-child(even) {
    background-color: #2C3446;
}

.container th {
    background-color: #1F2739;
}

.container td:first-child { color: #FB667A; }

.container tr:hover {
   background-color: #464A52;
-webkit-box-shadow: 0 6px 6px -6px #0E1119;
     -moz-box-shadow: 0 6px 6px -6px #0E1119;
          box-shadow: 0 6px 6px -6px #0E1119;
}

.container td:hover {
  background-color: rgb(235, 227, 0);
  color: #403E10;
  font-weight: bolder;
  
  box-shadow: #7F7C21 -1px 1px, #7F7C21 -2px 2px, #7F7C21 -3px 3px, #7F7C21 -4px 4px, #7F7C21 -5px 5px, #7F7C21 -6px 6px;
  transform: translate3d(6px, -6px, 0);
  
  transition-delay: 0s;
    transition-duration: 0.4s;
    transition-property: all;
  transition-timing-function: line;
}

@media (max-width: 800px) {
.container td:nth-child(4),
.container th:nth-child(4) { display: none; }
}


 /* تنسيقات الجدول انتهت */





 
        #txtsearch {
            width: 200px;
            -webkit-transition: width 0.4s ease-in-out;
            transition: width 0.4s ease-in-out;
        }

        #txtsearch:focus {
            width: 90%;
        }

       

        footer {
            z-index: 99;
            position: absolute;
            bottom: 0px;
            /* font-size: 18px; */
            width: 100%;
        }

        body {
            background-image: radial-gradient(circle, #5a768a, #4d687d, #415971, #354c64, #2a3e58, #253954, #213550, #1c304c, #1b334f, #1a3651, #193954, #183c56);
        }



        /* ------------------------- */


        .post-subtitle{
                font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            }
            
            h4 {
                font-family: 'Tajawal', sans-serif;              
  transition: 0.7s;
  background-color: rgb(128,128,128,0.2);
  border-left: 9px solid rgba(255, 22, 22, 0.6);
  padding:6px;
  border-radius: 0px 22px 0px 12px;
}
h4:hover{
 border-left: 6px solid rgba(20, 255, 0, 0.2);
 color: white;
  background-color:rgba(53, 42, 46, 0.4);
  border-radius: 0px 32px 0px 22px;
}



            @media screen and (max-width: 900px) {  
                .post-title{
                    font-size: 22px;
                }
                 
                h2{
                    font-size: 14px;
                }  
                h4{
                    font-size: 12px;
                }        
                html, body {
    max-width: 100%;
    overflow-x:hidden;
}
        .container {
                /* margin: 10px; */
            }   
            
}  

    </style>
</head>

<body>


    <?php
    // Headerاستدعاء ملف ال 
    include("Header.php");
    ?>




    <!-- start News -->
    <div class="lastest container mt-4 mt-sm-5">
        <div class="row" style="color: white;">
            <div class="col-lg-6">
                <h2 class="font-weight-bolder float-left">The News</h2>
            </div>           
        </div>


        <hr>
       

     


 <article>
            <!-- كود عرض بيانات الرسائل -->
            <div class="container">
                <div class="row">

                    <!-- كود تقسم البيانات على شكل مجموعات او صفحات -->
                    <?php                  

                    // استعلام عرض بيانات من جدول المنشورات
                    $sql1 = "SELECT * FROM `news`";
                    $stmt1 = $dbh->prepare($sql1);
                    $stmt1->execute();

                    // joinاستعلام عرض بيانات من جدول المنشورات وجدول المناطق بستخدام ال
                    $id=intval($_GET['id']);
                    $sql = "SELECT news.* FROM news where id=$id";
                    $query = $dbh->prepare($sql);
                    // تنفيذ الاستعلام
                    $query->execute();
                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                    $cnt = 1;
                    // 0 اذا كانت البيانات اكثر من 
                    if ($query->rowCount() > 0) {
                        // foreach ف بستخدام 
                        // ليتم عرض بيانات على شكل بيانات
                        foreach ($results as $result) {
                    ?>
                            <div class="col-md-10 col-lg-12">
                                <div class="post-preview">
                                    <!-- كود عرض رقم المنشور -->                                    
                                        <!-- كود عرض عنوان المنشور -->
                                        <h2 class="post-title"><?php echo htmlentities($result->title); ?>,
                                            <!-- كود عرض الاقضية -->
                                            <i>🔥<?php echo htmlentities($result->creationdate); ?></i>                              
                                        </h2>
                                        <!-- الوصف -->
                                        <font align="right" face="Tajawal"><h4 class="post-subtitle" style="direction:rtl ;text-align: justify;"><?php echo htmlentities($result->description); ?></h4></font> 
                                    </a>
                                    <!-- كود عرض اسم المستخدم -->
                                    <p class="post-meta">Posted by&nbsp;<?php echo htmlentities($result->username); ?>
                                        <!-- كود عرض تاريخ النشر -->
                                        <font COLOR="red"> on </font><?php echo htmlentities($result->creationdate); ?><i style="margin: 0px 11px 0px 71px;"></i>Total <i class="fa fa-eye" aria-hidden="true"></i> : <?php echo htmlentities($result->view_total); ?>
                                    </p>
                                    
                                </div>
                                <hr>
                            </div>
                            
                            <?php
                    $id = intval($_GET['id']);
                    // استعلام عرض بيانات
                    $sql1 = "SELECT image1 FROM news,news_images WHERE news.id=news_id and news.id=:id";
                    $query = $dbh->prepare($sql1);
                    $query->bindParam(':id', $id, PDO::PARAM_STR);
                    $query->execute();
                    $results_img = $query->fetchAll(PDO::FETCH_OBJ);
                    // اذا توفرت بيانات قم بعرضها
                    if ($query->rowCount() > 0) {
                      foreach ($results_img as $results_img) {
                    ?>

                        <img class="img-fluid" src="uploads/News/<?php echo $id . "/" . htmlentities($results_img->image1); ?>" width="auto" height="auto" style="border:solid 1px #000">


                    <?php }
                    } ?>
                            
                    <?php



                            try {

                                $max = 1;
                                $id = htmlentities($result->id);
                                $sqlview = "SELECT view_total FROM news WHERE id=:id";
                                $query2 = $dbh->prepare($sqlview);
                                $query2->bindParam(':id', $id, PDO::PARAM_STR);
                                $query2->execute();
                                $results3 = $query2->fetchAll(PDO::FETCH_OBJ);
                                foreach ($results3 as $result3) {
                                    $view = htmlentities($result3->view_total);
                                    $max = (int)$view + 1;
                                }

                                // كود تحديث
                                $sql = "UPDATE `news` SET view_total=:maxview WHERE id=:id ";
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
                        }





                    } ?>
               

                </div>

<!-- كود تحديث المشاهدة -->

        <!-- Footer -->

        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/clean-blog.js"></script>

</div>

</body>

</html>