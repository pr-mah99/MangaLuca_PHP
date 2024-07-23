<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
    #txtsearch {
            width: 200px;
            -webkit-transition: width 0.4s ease-in-out;
            transition: width 0.4s ease-in-out;
        }

        #txtsearch:focus {
            width: 90%;
        }

div.scrollmenu {
  background-color: #333;
  overflow: auto;
  white-space: nowrap;
}

div.scrollmenu a {
  display: inline-block;
  color: white;
  text-align: center;
  padding: 14px;
  text-decoration: none;
  transition: 0.4s;
}

div.scrollmenu a:hover {
  background-color: #777;
}
</style>
</head>
<body>
<?php
    session_start();
    // Headerاستدعاء ملف ال 
    include("Header.php");
    ?>


<div class="scrollmenu">
  <a href="?s=سينين">سينين</a>
  <a href="?s=شونين">شونين</a>
  <a href="?s=طبي">طبي</a>
  <a href="?s=عائلي">عائلي</a>
  <a href="?s=عنف">عنف</a>
  <a href="?s=سحر">سحر</a>
  <a href="?s=تاريخي">تاريخي</a>  
  <a href="?s=خيال">خيال</a>
  <a href="?s=إنتقام">إنتقام</a>
  <a href="?s=دراما">دراما</a>
  <a href="?s=طبخ">طبخ</a>
  <a href="?s=العاب">العاب</a>
  <a href="?s=مدرسي">مدرسي</a>
  <a href="?s=اكشن">اكشن</a>
  <a href="?s=كوميديا">كوميديا</a>
  <a href="?s=مغامرة">مغامرة</a>
  <a href="?s=رعب">رعب</a>
  <a href="?s=فنون قتال">فنون قتال</a>
  <a href="?s=ذكاء">ذكاء</a>
  <a href="?s=جريمة">جريمة</a>

</div>

<hr>


    <!-- start lastest -->
    <div class="lastest container mt-4 mt-sm-5">
        <div class="row" style="color: white;">
            <div class="col-lg-6">
                <h2 class="font-weight-bolder float-left">List ALL Manga & Manhwa</h2>
            </div>           
        </div>


        <hr>
        <div class="col">
            <form class="form-inline search" method="post">
                <input type="text" class="form-control" id="txtsearch" name="txtsearch" placeholder="ادخل اسم المانجا هنا" aria-label="Type Title, auther or genre">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" name="search_btn" id="search_btn"><i class="fa fa-search"></i></button>
                </div>
            </form>
        </div>

        <br>
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

        // Select with search Start
        // البحث   
        if (isset($_POST["txtsearch"])) {
            $search_value = $_POST["txtsearch"];
            // ننشاء متغير ونساوية للمربع النص الخاص بالبخث   
            $sql = "SELECT id,image1,creationdate,genre,written FROM manga WHERE CONCAT(name, description,genre,written) like '%$search_value%';";
        }
        // Select with search End

        // Select All Start
        elseif(isset($_GET["s"])) {                      
            // اعادة تحديث الصفحة في حالة لم يكتب شي    
            $genre=htmlentities($_GET['s']);           
            $sql = "SELECT id,image1,creationdate,genre,written FROM manga WHERE genre like '%$genre%';";
        }
        else{
            $sql = "SELECT id,image1,creationdate,genre,written FROM manga;";
        }
       
        $query = $dbh->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        $cnt = 1;
        if ($query->rowCount() > 0) {
            foreach ($results as $result) { ?>


                <div class="posts">
                    <div class="col-lg-2 col-md-3 col-sm-4" style="float: left;">
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


</body>
</html>
