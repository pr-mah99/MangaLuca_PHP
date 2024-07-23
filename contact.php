
<?php
  session_set_cookie_params(0);
  session_start();   
include "Header.php" ; ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="text/html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Template Stylesheet -->
    <link rel="stylesheet" href="Contact_css/style.css" Type="text/css">
    <!-- Google Font -->
    <link href="https:\\fonts.googleapis.com\css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet" Type="text/css">
     <!-- CSS Libraries -->

     <style>    
     
.btnz {
    margin-left: 90px;
  padding: 12px 20px;
  font-size: 14px;
  font-weight: 600;
  color: #ffffff;
  background: rgb(17, 74, 36);
  border-radius: 0;
  transition: 0.3s;
}
.btnz:hover {
  box-shadow: 1px 1px 2px black, 0 0 15px rgb(156, 156, 241), 0 0 1px darkblue;
  /* padding: 13px 21px; */
  font-size: 15px;
  font-weight: 610;
  color: #ffffff;
  background: rgb(13, 133, 53);
}
     .container p{
        text-align: center;
     }
        h2,p{
            text-align: center;
        }
     </style>
     
</head> 
<?php
    
    if (isset($_POST['contact_send'])) {
        // تعريف متغيرات اعمدة الجدول

     



// أستدعاء كود اتصال بقاعدة البيانات
// include('config.php');
if (strlen($_SESSION['login_userid_manga']) == 0) {
    echo "<script>alert('You Have To Login');document.location = 'admin/admin.php';</script>";
} else {
    try{
        echo "<script>alert('تم الارسال بنجاح');</script>";
        // $name = $_POST["c_name"];
        // $email = $_SESSION["user_email_address"];
        $id=$_SESSION['login_userid_manga'];
        $subject = $_POST["c_subject"];
        $message = $_POST["c_message"];
        

        // ادخال بيانات

        $sql = "insert into contact (id_user,Subject,message)values('$id','$subject','$message')";

        $query = $dbh->prepare($sql);
        $query->execute();
        echo '<div class="Notiction">
        <strong>رائع!</strong> تم الارسال بنجاح ?!
      </div>';

        // header('Refresh: 2');
        // تحديث الجدول بعد ادخال البيانات                
    }
    catch(PDOException $e){
        echo $sql . "<br>" . $e->getMessage(); 
    }

    }
}
    ?>

<!-- Contact Start -->
<form method="post"?>
	<div class="contact">
            <div class="container">
                <div class="section-header text-center wow zoomIn" data-wow-delay="0.1s">
                   <p><?php echo $translate["contact_1"];  ?></p>  <!-- Keep in Touch -->
                    <h2><?php echo $translate["contact_9"];  ?></h2>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-md-4 contact-item wow zoomIn" data-wow-delay="0.2s">
                                <i class="fa fa-map-marker-alt"></i>
                                <div class="contact-text">
                                  <h2>أبقى على تواصل معنا</h2>    <!-- Location -->
                                    <p>ادخل المعلومات من هنا</p>
                                </div>
                            </div>
                            <div class="col-md-4 contact-item wow zoomIn" data-wow-delay="0.4s">
                                <i class="fa fa-phone-alt"></i>
                                <div class="contact-text">
                                    <h2>الهاتف</h2>
                                    <p>+964 771 325 1135</p>
                                </div>
                            </div>
                            <div class="col-md-4 contact-item wow zoomIn" data-wow-delay="0.6s">
                                <i class="far fa-envelope"></i>
                                <div class="contact-text">
                                    <h2>البريد الاكتروني </h2>
                                    <p>info@Mangaluca.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="contact-form">

                       <div id="success"></div>
                        <form name="sentMessage" id="contactForm" novalidate="novalidate">
<!-- 
                                <div class="control-group">
                                    <input type="text" class="form-control" id="name" name="c_name" placeholder="Your Name" required="required" data-validation-required-message="Please enter your name" />
                                    <p class="help-block text-danger"></p>
                                </div> -->

                                <!-- <div class="control-group">
                                    <input type="email" class="form-control" id="email" name="c_email" placeholder="Email" required="required" data-validation-required-message="Please enter your email" />
                                    <p class="help-block text-danger"></p>
                                </div> -->

                                <div class="control-group">
                                    <input type="text" class="form-control" id="subject" name="c_subject" placeholder="الموضوع" required="required" data-validation-required-message="Please enter a subject" />
                                    <p class="help-block text-danger"></p>
                                </div>

                                <div class="control-group">
                                    <textarea class="form-control" id="message" name="c_message" placeholder="رسالتك" required="required" data-validation-required-message="Please enter your message"></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>

                                <div>
                                    <button class="btnz" type="submit" name="contact_send" id="sendMessageButton">ارسال الان</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</form>
<!-- Cont end-->
<?php
include("Footer.php");
?>
<!-- JavaScript Libraries -->

</body>	
</html>