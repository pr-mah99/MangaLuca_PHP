<?php
session_set_cookie_params(0);
// بدا الجلسة الجديدة
session_start();
// أستدعاء كود اتصال بقاعدة البيانات
include('config.php');
if (strlen($_SESSION['login']) == 0) {
    header('location: admin.php');
} else {
   
?>

    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>Manage Total</title>
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic">
        <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
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
                .go{
                    display: block;
                    font-size: 15px;
                    margin-right: 11px;
                    margin-top: 6px;
                }    
        .container {
                width: 90%;
            }   
            table th{
                    font-size: 10px;
                }

                table th{
                    font-size: 10px;
                }

                table td {
                    font-size: 12px;
                    text-align: center;
                }
}   



/* Total Bord Start Here */
.text {
            font-weight: bold;
        }

        .containerz {
            z-index: 99;
            position: absolute;
            margin-left: 0px;
            margin-top: -65px;
        }

        .rowz {
            /* background-color:rebeccapurple;  
    background-color: rgba(55, 22, 123, 0.7); */
            box-shadow: rgba(6, 24, 44, 0.4) 0px 0px 0px 2px, rgba(6, 24, 44, 0.65) 0px 4px 6px -1px, rgba(255, 255, 255, 0.08) 0px 1px 0px inset;
            background-image: radial-gradient(circle, #5a768a, #4d687d, #415971, #354c64, #2a3e58, #253954, #213550, #1c304c, #1b334f, #1a3651, #193954, #183c56);
            border: 1px solid rgba(255, 22, 123, 0.3);
            color: white;
            float: left;
            margin: 22px;
            padding: 15px;
            font-size: 18px;
            font-family: 'Tajawal', sans-serif;
        }

        .rowz:hover {
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            background: rgb(2, 0, 36);
            background: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgba(9, 9, 121, 1) 35%, rgba(0, 212, 255, 1) 100%);
        }


        @media screen and (max-width: 900px) {       
            .rowz{
                width: 300px;
                margin-top: 5px;
                margin-bottom: 3px;
            }     
            .containerz {
            position:relative;
            margin-left: 0px;
            margin-top: -5px;
            margin-bottom:-19px;
            }
        }
/* Total Bord End Here */
        </style>
    </head>

    <body>

    <!-- Header -->


   <header class="masthead" style="background-image:url('assets/img/home-bg.jpg');">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-lg-8 mx-auto">
                        <div class="site-heading">
                            <a href="admin.php" class="go">- Home -</a>
                            <h1>All Manage</h1><span class="subheading">Show All Information</span>
                            <br><a href="manga/manage-manga.php" class="go">-Back -</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Header -->



<!-- All Dashboard Start  -->

   
            <div class="container">
                <div class="row">

                    <div class="container-fluid">
                        <h3 class="text-dark mb-4">Dashboard</h3>
                        <div class="card shadow">
                            <div class="card-header py-3">
                                <p class="text-primary m-0 font-weight-bold">Total Of Total</p>
                            </div>
                            <a href="#" class="btn btn-primary">All info</a>
                            <br>
                                  
        <div class="card-body">
            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
              
            <!-- Total Bord Start Here  -->
                <div class="containerz">
            <div class="rowz">
                <span class="text">أجمالي المانجا :</span>
                <span class="info-box-number text-right">
                    <?php
                    echo $conn->query("SELECT * FROM `manga`")->num_rows;
                    ?>
                </span>
            </div>
            <div class="rowz">
                <span class="text">أجمالي الفصول :</span>
                <span class="info-box-number text-right">
                    <?php
                    echo $conn->query("SELECT * FROM `chapter`")->num_rows;
                    ?>
                </span>
            </div>
            <div class="rowz">
                <span class="text">عدد المستخدمين :</span>
                <span class="info-box-number text-right">
                    <?php
                    echo $conn->query("SELECT * FROM `users`")->num_rows;
                    ?>
                </span>
            </div>
            <div class="rowz">
                <span class="text">الرسائل المرسلة :</span>
                <span class="info-box-number text-right">
                    <?php
                    echo $conn->query("SELECT * FROM `contact`")->num_rows;
                    ?>
                </span>
            </div>
            <div class="rowz">
                <span class="text">أجمالي الطلبات :</span>
                <span class="info-box-number text-right">
                    <?php
                    echo $conn->query("SELECT * FROM `request`")->num_rows;
                    ?>
                </span>
            </div>

        </div><!-- End container -->
             <!-- Total Bord End Here  -->


            </div>
            
                </div>
            </div>
     
        
        <br><br>

<!-- ALL Dashboard End -->

<!-- All Manga Start  -->

 
            <div class="container">
                <div class="row">

                    <div class="container-fluid">
                        <h3 class="text-dark mb-4">All Managa</h3>
                        <div class="card shadow">
                            <div class="card-header py-3">
                                <p class="text-primary m-0 font-weight-bold">All Type Manga</p>
                            </div>
                            <a href="#" class="btn btn-primary">Show the User Total</a>
                            <br>
                                  
        <div class="card-body">
            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                <!-- عمل جدول لعرض البيانات -->
                <table class="table dataTable my-0" id="dataTable">
                    <thead>
                        <tr>
                            <!-- الاعمدة -->
                            <th>#</th>                        
                            <th>Manga Name</th>                          
                            <th>Total Chapters</th>
                            <th>By: User</th>
                            <th>Date Join</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        // عرض بيانات على شكل صفوف
                        $sql = "SELECT fullname,name,COUNT(chapter.manga),users.creationdate FROM chapter,manga,users WHERE chapter.manga=manga.id and users.id=manga.userid GROUP BY fullname,name,users.creationdate ORDER BY Date DESC;";
                        $query = $dbh->prepare($sql);
                        $query->execute();
                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                        $cnt = 1;                   
                        $c2='COUNT(chapter.manga)';
                        if ($query->rowCount() > 0) {
                            foreach ($results as $result) { ?>
                                <tr>
                                    <td><?php echo htmlentities($cnt); ?></td>                                   
                                    <td><?php echo htmlentities($result->name); ?></td>
                                    <td><?php echo htmlentities($result->$c2); ?></td>
                                    <td><?php echo htmlentities($result->fullname);?> </td>                                                                   
                                    <td><?php echo htmlentities($result->creationdate); ?></td>
                                    
                                </tr>
                        <?php $cnt = $cnt + 1;
                            }
                        } ?>

                    </tbody>
                </table>
            </div>
            
                </div>
            </div>
     
        
        <br><br>

<!-- ALL Manga End -->

    <!-- Total Managa -->
        <!-- Header -->


        <header class="masthead" style="background-image:url('assets/img/home-bg.jpg');">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                  
                </div>
            </div>
        </header>
        <!-- Header -->
            <div class="container">
                <div class="row">

                    <div class="container-fluid">
                        <h3 class="text-dark mb-4">Total</h3>
                        <div class="card shadow">
                            <div class="card-header py-3">
                                <p class="text-primary m-0 font-weight-bold">Total Users</p>
                            </div>
                            <a href="#" class="btn btn-primary">Display the Total</a>
                            <br>
                                  
        <div class="card-body">
            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                <!-- عمل جدول لعرض البيانات -->
                <table class="table dataTable my-0" id="dataTable">
                    <thead>
                        <tr>
                            <!-- الاعمدة -->
                            <th>#</th>
                            <th>Users Name</th>
                            <th>Total Manga</th>                          
                            <th>Date Join</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        // عرض بيانات على شكل صفوف
                        $sql = "SELECT fullname,COUNT(manga.name),users.creationdate FROM manga,users WHERE users.id=manga.userid GROUP BY fullname,users.creationdate ORDER BY users.creationdate DESC;";
                        $query = $dbh->prepare($sql);
                        $query->execute();
                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                        $cnt = 1;
                        $c1='COUNT(manga.name)';
                        if ($query->rowCount() > 0) {
                            foreach ($results as $result) { ?>
                                <tr>
                                    <td><?php echo htmlentities($cnt); ?></td>                                   
                                    <td><?php echo htmlentities($result->fullname);?></td>
                                    <td><?php echo htmlentities($result->$c1); ?></td>                                 
                                    <td><?php echo htmlentities($result->creationdate); ?></td>
                                    
                                </tr>
                        <?php $cnt = $cnt + 1;
                            }
                        } ?>

                    </tbody>
                </table>
                <table class="table dataTable my-0" id="dataTable">
                    <thead>
                        <tr>
                            <!-- الاعمدة -->
                            <th>#</th>
                            <th>Users Name</th>
                            <th>Total Chapters</th>
                            <th>Date Join</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        // عرض بيانات على شكل صفوف
                        $sql = "SELECT fullname,COUNT(chapter.manga),users.creationdate FROM chapter,users WHERE users.id=chapter.user GROUP BY fullname,users.creationdate ORDER BY users.creationdate DESC;";
                        $query = $dbh->prepare($sql);
                        $query->execute();
                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                        $cnt = 1;               
                        $c2='COUNT(chapter.manga)';
                        if ($query->rowCount() > 0) {
                            foreach ($results as $result) { ?>
                                <tr>
                                    <td><?php echo htmlentities($cnt); ?></td>                                   
                                    <td><?php echo htmlentities($result->fullname);?></td>             
                                    <td><?php echo htmlentities($result->$c2); ?></td>
                                    <td><?php echo htmlentities($result->creationdate); ?></td>
                                    
                                </tr>
                        <?php $cnt = $cnt + 1;
                            }
                        } ?>

                    </tbody>
                </table>
            </div>
            
                </div>
            </div>
     
        
        <br><br>
        <!-- Footer -->

        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/clean-blog.js"></script>
    </body>

    </html>
<?php } ?>