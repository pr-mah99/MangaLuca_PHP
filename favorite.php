<!-- لوحة تحكم الخاصة بالمنشورات -->
<?php
 session_set_cookie_params(0);
 session_start();   


// أستدعاء كود اتصال بقاعدة البيانات
// include('config.php');
if (strlen($_SESSION['login_userid_manga']) == 0) {
    header('location: admin/admin.php');
} else {
   
?>
<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Manga Luca - مانجا لوكا</title>  
    <style>
        footer{
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

<body>
<!--  Headerاستدعاء ملف ال  -->
<?php include("Header.php");?>

    


    <!-- start lastest -->
    <div class="lastest container mt-4 mt-sm-5">
        <div class="row"  style="color: white;">
            <div class="col-lg-6">
                <h2 class="font-weight-bolder float-left">Your Favorite Manga</h2>
            </div>
            <div class="col-lg-6">
                <ul class="calendar list-unstyled list-inline float-right font-weight-bold mt-3 mt-sm-0">
                    <!-- <li class="list-inline-item active">صدرت اليوم</li>
                    <li class="list-inline-item">الاعلى مشاهدة</li>
                    <li class="list-inline-item">الاعلى تقيما</li>
                    <li class="list-inline-item">اختيار عشوائي</li> -->
                    <!-- <li class="list-inline-item">مانجا الشهر</li>
                    <li class="list-inline-item">مانجا السنة</li> -->
                </ul>
            </div>
        </div>


        <hr>

        <?php
            $get_id=$_SESSION['login_userid_manga'];
            $sql = "SELECT manga.id,type,image1,creationdate,genre,written,favorite.date FROM manga,favorite WHERE favorite.manga=manga.id and favorite.userid=$get_id;";
            $query = $dbh->prepare($sql);
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_OBJ);
            $cnt = 1;
            if ($query->rowCount() > 0) {
              foreach ($results as $result) { ?>
       

                <div class="posts">
            <div class="col-lg-2 col-md-3 col-sm-4" style="float: left;">
                <div class="card mb-3" >
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
                        <p class="card-text"><?php echo htmlentities($result->date); ?></p>
                        <p class="card-text"><small class="text-muted text-uppercase">Update 1 Hour ago</small></p>
                    </div>
                    
                </div>
                
            </div>
            
            <?php $cnt = $cnt + 1;
              }
            } ?>
        </div> 
        </div>   </div>   </div> 
    <!-- end lastest -->


 






    </div>   </div>   </div>   </div>



   
    <hr>
  
</body>

</html>


<?php } ?>