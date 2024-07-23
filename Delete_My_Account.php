<?php
session_set_cookie_params(0);
session_start();
// Headerاستدعاء ملف ال 
include("Header.php");
include('admin/config.php');
?>

<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Manga Luca - مانجا لوكا</title>
    <style>
        p {
            color: #fff;
        }



        body {
            background-image: radial-gradient(circle, #5a768a, #4d687d, #415971, #354c64, #2a3e58, #253954, #213550, #1c304c, #1b334f, #1a3651, #193954, #183c56);
        }

        .container {
            padding: 40px;
            width: 100%;
            color: white;
        }

        .paragraph {
            color: white;
            padding: 40px 150px 10px 150px
        }

        @media screen and (max-width: 900px) {
            .container {
                font-size: 12px;
            }

            .paragraph {
                color: white;
                padding: 10px 10px 10px 10px
            }
        }

        /* ------------------------ */

        body {
            font-family: Arial, sans-serif;
        }

        .container {
            padding: 20px;
        }

        button {
            padding: 10px 20px;
            background-color: #f00;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        button:disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }

        label {
            margin-right: 10px;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {        
        if (isset($_POST["checkbox"]) && $_POST["checkbox"] === "on") {
           
            $id=$_SESSION['login_userid_manga'];

            $sql = "UPDATE users Set isDeleted='true' where id=:user_id and type='user';";
            $query = $dbh->prepare($sql);
            $query->bindParam(':user_id', $id, PDO::PARAM_STR);    
            $query->execute();
            echo "<script>alert('تم حذف الحساب بنجاح');</script>";

            $_SESSION['fullname']=null;
            $_SESSION['login_userid_manga']=null;
            $_SESSION['login']=null;

            unset($_SESSION['login']);
            // انهاء الجلسة
            session_destroy();
            $currentpage = $_SESSION['redirectURL'];
            // الرجوع الى القائمة الرئيسية
            header("location: index.php");

        } else {
            echo "<script>alert('تأكد من الاتصال بالانترنيت');</script>";
        }
    }
    ?>



    <div class="lastest container mt-4 mt-sm-5">
        <div class="col-lg-6">
            <h2 class="font-weight-bolder float-left">حذف حساب المستخدم</h2>
        </div>
    </div>
    <hr>
    <p class="paragraph">
        يمكن للمستخدم حذف حسابة نهائيا من خلال تقديم طلب حذف الحساب
    </p>

    <hr style="background-color:#fff">

    <h5>الخطوات :</h5>
    <p>1- سجل الدخول باستخدام حساب جوجل</p>
    <p>2- اضغط على زر التاكيد</p>
    <p>3- اضغط على الحذف</p>
    <p>4-سيتم حذف كل شي يخصك في قاعدة بيانات الخاصة بالموقع والتطبيق</p>

    <?php if(isset($_SESSION['login_userid_manga']) && !empty($_SESSION['login_userid_manga'])) {?>
  
    <div class="container">
        <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <label for="checkbox">نعم , أنا متاكد من الحذف</label>
            <input type="checkbox" id="checkbox" name="checkbox" >
            <button type="submit" name="deleteButton" disabled style="margin-left: 20px;">حذف</button>
        </form>
    </div>

    <?php } ?>

    </div>

    <br>
    <br>


    <script>
        const checkbox = document.getElementById('checkbox');
        const deleteButton = document.querySelector('button[name="deleteButton"]');

        checkbox.addEventListener('change', () => {
            deleteButton.disabled = !checkbox.checked;
        });       
    </script>


</body>

</html>
<?php
include("Footer.php");
?>