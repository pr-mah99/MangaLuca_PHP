
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
      @media screen and (max-width: 900px) {
        .slider{
            margin-bottom: 32px;
        }
        .nav-m,.nav-auto{
        display:none;
    }
       
    }
     .container{
            /* padding:40px; */
            width:100%;
            color: white;
        }
        .paragraph{
            color: white; padding: 40px 40px 10px 40px
        }
        @media screen and (max-width: 900px) {
            .container{
                font-size: 8px;   
        }
    }

    html,body{
        scroll-behavior: smooth;
    }
        .sortstyle a:nth-child(odd){
            margin-right: 15px;
            /* background-color: red; */
            color: white;
        }
        .sortstyle a:nth-child(even){
            padding-right: 11px;    
            /* background-color: red; */
            color: burlywood;
        }
        .sortstyle a:hover{
            color: blueviolet;
        }

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


    </style>
</head>



<?php
         session_set_cookie_params(0);
         session_start();   
    // Headerاستدعاء ملف ال 
    include("Header.php");
    ?>


    <!-- start slider -->


 <section class="section">
        <div class="slider">
            <div class="slide">
                <input type="radio" name="radio-btn" id="radio1">
                <input type="radio" name="radio-btn" id="radio2">
                <input type="radio" name="radio-btn" id="radio3">
                <input type="radio" name="radio-btn" id="radio4">
                <input type="radio" name="radio-btn" id="radio5">
                <input type="radio" name="radio-btn" id="radio6">
                <input type="radio" name="radio-btn" id="radio7">
                <input type="radio" name="radio-btn" id="radio8">
                <input type="radio" name="radio-btn" id="radio9">
                <input type="radio" name="radio-btn" id="radio10">
                <div class="st first">
                    <img src="Slider/image/slider1.jpg" alt="">
                </div>
                <div class="st two">
                    <img src="Slider/image/slider2.jpg" alt="">
                </div>
                <div class="st three">
                    <img src="Slider/image/slider3.jpg" alt="">
                </div>
                <div class="st four">
                    <img src="Slider/image/slider4.jpg" alt="">
                </div>
                <div class="st five">
                    <img src="Slider/image/slider5.jpg" alt="">
                </div>
                <div class="st six">
                    <img src="Slider/image/slider6.jpg" alt="">
                </div>
                <div class="st seven">
                    <img src="Slider/image/slider7.jpg" alt="">
                </div>
                <div class="st eight">
                    <img src="Slider/image/slider8.jpg" alt="">
                </div>
                <div class="st nine">
                    <img src="Slider/image/slider9.jpg" alt="">
                </div>
                <div class="st ten">
                    <img src="Slider/image/slider10.jpg" alt="">
                </div>
                <div class="nav-auto">
                    <div class="a-b1"></div>
                    <div class="a-b2"></div>
                    <div class="a-b3"></div>
                    <div class="a-b4"></div>
                    <div class="a-b5"></div>
                    <div class="a-b6"></div>
                    <div class="a-b7"></div>
                    <div class="a-b8"></div>
                    <div class="a-b9"></div>
                    <div class="a-b10"></div>
                </div>
            </div>
            <div class="nav-m">
                <label for="radio1" class="m-btn"></label>
                <label for="radio2" class="m-btn"></label>
                <label for="radio3" class="m-btn"></label>
                <label for="radio4" class="m-btn"></label>
                <label for="radio5" class="m-btn"></label>
                <label for="radio6" class="m-btn"></label>
                <label for="radio7" class="m-btn"></label>
                <label for="radio8" class="m-btn"></label>
                <label for="radio9" class="m-btn"></label>
                <label for="radio10" class="m-btn"></label>
            </div>
            <script type="text/javascript">
                var counter = 1;
                setInterval(function() {

                    document.getElementById('radio' + counter).checked = true;
                    counter++;
                    if (counter > 9) {
                        counter = 1;
                    }
                }, 5000);
            </script>
        </div>
    </section>
<br><br><br>

    <!-- end slider -->


     <!-- Most View - Start -->
     <div class="lastest container mt-4 mt-sm-5" id="mostview"><br>
    <div class="row" style="color: white;">
            <div class="col-lg-6">
                <h2 class="font-weight-bolder float-left">Most View Manga</h2>
            </div>
            <div class="col-lg-6">
                <ul class="calendar list-unstyled list-inline float-right font-weight-bold mt-3 mt-sm-0">
                    <div class="sortstyle">
                   <a href="#new"><li class="list-inline-item active">صدرت اليوم</li></a>
                   <a href="#mostview"> <li class="list-inline-item">الاعلى مشاهدة</li></a>
                   <a href="#mostrate"><li class="list-inline-item">الاعلى تقيما</li></a>
                   <a href="#mangayear">  <li class="list-inline-item">مانجا السنة</li></a>
                   <a href="#mangamonth"><li class="list-inline-item">مانجا الشهر</li></a>
                   <a href="#mangaday"> <li class="list-inline-item">مانجا اليوم</li></a>
                   </div>
                </ul>
            </div>
        </div>

        <hr>
        
        <div class="row">
            <form class="form-inline" method="post" style="width: 1200px;">
                <input type="text" class="form-control" id="txtsearch" name="txtsearch" placeholder="ادخل اسم المانجا هنا" aria-label="Type Title, auther or genre">                
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" name="search_btn" id="search_btn"><i class="fa fa-search"></i></button>         
                    <a href="Manga_more.php?sort=most_view" class="form-control" style="margin-left:10%;">المزيد></a>
                </div>
            </form>            
        </div>
        

        <br>
        <?php      
 if (isset($_POST["txtsearch"])) {
    $search_value = $_POST["txtsearch"];
    // ننشاء متغير ونساوية للمربع النص الخاص بالبخث   
    $sql = "SELECT id,name,type,image1,creationdate,genre,written FROM manga WHERE CONCAT(name, description,genre,written) like '%$search_value%' limit 18;";
}
// Select with search End

// Select All Start
else {
    // اعادة تحديث الصفحة في حالة لم يكتب شي    
    $sql = "SELECT manga.id,name,type,chapter,image1,date,creationdate,genre,written FROM manga,chapter WHERE manga.id=chapter.manga order by date DESC limit 18;";
}
        // $sql = "SELECT manga.id,name,type,image1,creationdate,genre,written FROM manga order by manga.view_total desc;";      
        $query = $dbh->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        $cnt = 1;
        if ($query->rowCount() > 0) {
            foreach ($results as $result) { ?>

                <div class="posts">
                    <div class="col-lg-2 col-md-3 col-sm-4" style="float: left;width: 40%;">
                        <div class="card mb-3">
                            <a href="details.php?id=<?php echo htmlentities($result->id); ?>"><img src="uploads/Poster/<?php echo htmlentities($result->image1); ?>" class="card-img-top" alt=""></a>
                            <div class="over text-center">                              
                                <div class="about-list">
                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <th scope="row">تصنيف:</th>
                                                <td><a href=""><?php echo htmlentities($result->genre); ?></a> </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">تاليف:</th>
                                                <td><?php echo htmlentities($result->written); ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">تاريخ:</th>
                                                <td><?php echo htmlentities($result->creationdate); ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <p class="about text-muted">
                                    لبدا في عرض هذة المانجا قم بضغط على بدا القراءة
                                </p>
                                <a class="reading btn" href="details.php?id=<?php echo htmlentities($result->id); ?>">عرض المانجا الان 🔥</a>
                            </div>
                            <div class="card-body">   
                                    
                                <?php if(!isset($_POST["txtsearch"]))
                                {
                                    ?>
                                <p class="card-text">CH. <?php echo htmlentities($result->chapter); ?></p>                        
                                    <?php   
                                }
                                ?>                          
                                <h6 class="card-title"><a href="details.php"><?php echo htmlentities($result->name); ?></a></h6>                               
                                <p class="card-text"><small class="text-muted text-uppercase">Update 1 Hour ago</small></p>
                            </div>

                        </div>

                    </div>
                </div>

            <?php $cnt = $cnt + 1;
            }
        } ?>
          
    <!-- Most view End -->





    




 <div class="dd" style="float :none; margin-top:233px;clear: both;"></div> <!--فاصلة  -->




      
<!-- Rate Manga -->




<div class="lastest container mt-4 mt-sm-5" id="mostrate"><br>
    <div class="row" style="color: white;">
        <div class="col-lg-6">
            <h2 class="font-weight-bolder float-left">Most Rate Manga</h2>
            <div class="col">
            <form class="form-inline search" method="post">
                  <div class="input-group-append">
                         <a href="Manga_more.php?sort=rate" class="form-control" style="margin-left:40%;">المزيد></a>
                </div>
            </form>            
        </div>
        </div>
        <div class="col-lg-6">
            <ul class="calendar list-unstyled list-inline float-right font-weight-bold mt-3 mt-sm-0">
            <div class="sortstyle">
                   <a href="#new"><li class="list-inline-item active">صدرت اليوم</li></a>
                   <a href="#mostview"> <li class="list-inline-item">الاعلى مشاهدة</li></a>
                   <a href="#mostrate"><li class="list-inline-item">الاعلى تقيما</li></a>
                   <a href="#mangayear">  <li class="list-inline-item">مانجا السنة</li></a>
                   <a href="#mangamonth"><li class="list-inline-item">مانجا الشهر</li></a>
                   <a href="#mangaday"> <li class="list-inline-item">مانجا اليوم</li></a>
                   </div>
            </ul>
        </div>
    </div>


    <hr>
    

    <br>
    <?php

        // اعادة تحديث الصفحة في حالة لم يكتب شي    
        $sql = "SELECT manga.id,name,type,image1,creationdate,genre,written,rate FROM manga order by creationdate DESC limit 18;";
 
    $query = $dbh->prepare($sql);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    $cnt = 1;
    if ($query->rowCount() > 0) {
        foreach ($results as $result) { ?>


            <div class="posts">
                <div class="col-lg-2 col-md-3 col-sm-4" style="float: left;width: 40%;">
                    <div class="card mb-3">
                        <a href="details.php?id=<?php echo htmlentities($result->id); ?>"><img src="uploads/Poster/<?php echo htmlentities($result->image1); ?>" class="card-img-top" alt=""></a>
                        <div class="over text-center">
                            <div class="head text-left">
                                <h6>Rate :<?php echo htmlentities($result->rate); ?></h6>
                            </div>
                            <div class="about-list">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <th scope="row">تصنيف:</th>
                                            <td><a href=""><?php echo htmlentities($result->genre); ?></a> </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">تاليف:</th>
                                            <td><?php echo htmlentities($result->written); ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">تاريخ:</th>
                                            <td><?php echo htmlentities($result->creationdate); ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <p class="about text-muted">
                                لبدا في عرض هذة المانجا قم بضغط على بدا القراءة
                            </p>
                            <a class="reading btn" href="details.php?id=<?php echo htmlentities($result->id); ?>">عرض المانجا الان 🔥</a>
                        </div>
                        <div class="card-body">
                            <h6 class="card-title"><a href="details.php"><?php echo htmlentities($result->name); ?></a></h6>                   
                            <p class="card-text"><small class="text-muted text-uppercase">Update 1 Hour ago</small></p>
                        </div>

                    </div>

                </div>

        <?php $cnt = $cnt + 1;
        }
    } ?>
            </div>
</div>
</div>
</div>
<!-- Select All End -->









<div class="dd" style="float :none; margin-top:433px;clear: both;"></div> <!--فاصلة  -->





<!-- Select All End -->



<div class="container py-4" style="padding:40px;width:100%;color: white;">
            <span class="copyright">&copy; 2023</span>
            <span class="design float-left">Copyright</span>
            <span class="design float-right">MangaLuca Team</span>
</div>


<!-- تفقد اذا كان موبايل او حاسوب --> 
<script>
if ($(window).width() > 900) {
//    alert('More than 900');
}
// <!-- اذا كان موبايل
else{
//    alert('Less than 9600');
//    $("#new").hide();
//    $("#mostview").hide();
   $("#mangaday").hide();
   $("#mostrate").hide();
   $("#mangamonth").hide();
//    $("#mangayear").hide();
}
// <!-- انتهى الشرط
 </script>



</body>

</html>