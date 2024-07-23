   <?php
    include("admin/config.php");
    ?>

   <head>
       <meta charset="UTF-8">
       <meta http-equiv="X-UA-Compatible" content="text/html">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">


       <!-- تحسينات محرك بحث جوجل -->
       <meta name="title" content="Manga Luca">
       <meta name="description" content="مانجا لوكا الموقع الاول العربي لقرأءة المانجا والمانهوا والكوميكس">
       <meta name="keywords" content="مانجا مترجمة, مانجا عربية , مانجا يابانية , مانجا لوكا, luca, mangaluca,manga,مانجا,مانهوا,كوميكس">
       <meta name="author" content="Mahmoud Shamran">
       <meta name="robots" content="index, follow">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <!-- تحسينات محرك بحث جوجل -->


       <!--  Essential META Tags -->
       <meta property="og:title" content="مانجا لوكا - Mangaluca">
       <meta property="og:type" content="article" />
       <meta property="og:image" content="icon-temp.png">
       <meta property="og:url" content="https://mangaluca.com/">
       <meta name="twitter:card" content="icus_large_image">

       <!--  Non-Essential, But Recommended -->
       <meta property="og:description" content="التطبيق الاول العربي لقرأءة المانجا والمانهوا والكوميكس">
       <meta property="og:site_name" content="The first Arab application to read manga, manhwa and comics">
       <meta name="twitter:image:alt" content="Mangaluca">

       <!--  Non-Essential, But Required for Analytics -->
       <!-- اذا كان هنالك تطبيق للمدرسة استخدم هذا الوسم  -->
       <!-- <meta property="fb:app_id" content="your_app_id" /> -->
       <!-- <meta name="twitter:site" content="@website-username"> -->

       <meta property="twitter:title" content="مانجا لوكا - Mangaluca">
       <meta property="twitter:description" content="التطبيق الاول العربي لقرأءة المانجا والمانهوا والكوميكس">
       <meta property="twitter:image" content="icon-temp.png">


       <!-- css files -->
       <link rel="stylesheet" href="css/bootstrap.min.css">
       <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css">
       <link rel="stylesheet" href="css/main.css">
       <link rel="stylesheet" href="style.css">
    
       <link rel="icon" href="icon-temp.ico">

       <!-- مكتبة الاعلان -->
       <script async custom-element="amp-ad" src="https://cdn.ampproject.org/v0/amp-ad-0.1.js"></script>
       <style>
           h2 {
               color: #FB667A;
           }
      
       </style>
       
       
   </head>

   <body>


       <!-- مكتبة الاعلان -->

       <amp-ad width="100vw" height="320" type="adsense" data-ad-client="ca-pub-4500588185521677" data-ad-slot="3766818915" data-auto-format="rspv" data-full-width="">
           <div overflow=""></div>
       </amp-ad>






       <!-- start navbar -->
       <nav class="navbar navbar-expand-lg navbar-light shadow py-2 py-sm-0">
           <a class="navbar-brand" href="index.php">
               <div class="logo" style="text-align:center;">
                   <h2> مانجا لوكا</h2>
                   <hr>
                   <h3>الموقع العربي الاول لقراءة المانجا</h3>
                   <h5>Manga Luca</h5>
               </div>
           </a>
           </a>
           <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <div class="container-fluid">
                   <div class="row py-3">
                       <div class="col-lg-8 col-sm-12 mb-3 mb-sm-0">
                           <ul class="navbar-nav mr-auto">
                               <!-- always use single word for li -->
                               <li class="nav-item active">
                                   <a class="nav-link" href="index.php">القائمة الرئيسية<span class="sr-only">(current)</span></a>
                               </li>
                               <li class="nav-item">
                                   <a class="nav-link" href="Manga_Show.php">قائمة المانجا</a>
                               </li>
                               <li class="nav-item">
                                   <a class="nav-link" href="Manhwa.php">قائمة المانهوا</a>
                               </li>                             
                               <li class="nav-item">
                                   <a class="nav-link" href="News.php">قائمة الأخبار</a>
                               </li>
                               <li class="nav-item">
                                   <a class="nav-link" href="favorite.php">قائمة المفضلة</a>
                               </li>
                               <li class="nav-item">
                                   <a class="nav-link" href="contact.php">تواصل معنا</a>
                               </li>
                               <li class="nav-item">
                                   <a class="nav-link" href="watch_history.php">سجل المشاهدة</a>
                               </li>

                               <li class="nav-item">
                                   <a class="nav-link" href="About.php">من نحنُ؟</a>
                               </li>


                           </ul>

                       </div>
                       <form class="form-inline search" method="post">
                           <div class="input-group">
                               <input type="text" class="form-control" name="txtsearch" placeholder="ادخل اسم المانجا هنا" aria-label="Type Title, auther or genre">
                               <div class="input-group-append">
                                   <button class="btn btn-outline-secondary" name="search_btn" id="search_btn"><i class="fa fa-search"></i></button>
                               </div>
                           </div>
                       </form>
                   </div>
               </div>
           </div>
           <div class="profile float-right">









               <!-- أكواد في حالة تسجيل الدخول او لا -->

               <?php
                // phpكود اخفاء الاخطاء في ال
                error_reporting(E_ALL ^ E_WARNING);
                error_reporting(E_ERROR | E_PARSE);
                // phpكود اخفاء الاخطاء في ال

                

                if (isset($_SESSION['login_userid_manga'])) {
                    ?> <div class="username">
                    <a href="admin/welcome.php">
                        <i class="fa fa-user-circle fa-2x" style="color: white;"></i>
                    </a>
                    <p><?php echo $_SESSION['fullname']; ?> </p>
                <?php

               
                                        } else {
                                            ?> <div class="username_befor_login">
                       <a href="admin/welcome.php">
                           <i class="fa fa-user-circle fa-2x" style="color: white;"></i>
                       </a>
                       <p>تسجيل الدخول</p> <?php
                                        }
                        ?>
                       </div>


                       <!-- تصغير قائمة لتناسب الموبايل -->
                       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                           <span class="navbar-toggler-icon" style="color: white;"></span>
                       </button>
       </nav>
       <!-- end navbar-->


       <!-- navbarمكاتب تنسيق القائمة ال -->
       <script src="js/jquery-3.4.1.min.js"></script>
       <script src="js/bootstrap.bundle.min.js"></script>

       <!-- Template Javascript -->
       <script src="js/main.js"></script>

   </body>