<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login Screen</title>
<style>
  body,.signin {
  background-color:rgb(62, 62, 62);
  font-family: 'Tajawal', sans-serif;
  color: #fff;
  font-size: 14px;
  letter-spacing: 1px;
}
a{
    border: #000;
    background-color: #4082f5;
}
.login {
  position: relative;
  height: 560px;
  width: 405px;
  margin: auto;
  padding: 60px 60px 50px 60px;
  background-size: cover;
  box-shadow: 0px 30px 60px -5px #000;
}

form {
  padding-top: 10px;
}

.active {
  border-bottom: 2px solid #1161ed;
}

.nonactive {
  color: rgba(255, 255, 255, 0.2);
}

h2 {
  padding-left: 12px;
  font-size: 22px;
  text-transform: uppercase;
  padding-bottom: 5px;
  letter-spacing: 2px;
  display: inline-block;
  font-weight: 100;
}

h2:first-child {
  padding-left: 0px;
}

span {
  text-transform: uppercase;
  font-size: 12px;
  opacity: 0.4; 
  display: inline-block;
  position: relative;
  top: -65px;
  transition: all 0.5s ease-in-out;
}

.text {
  border: none;
  width: 89%;
  padding: 10px 20px;
  display: block;
  height: 15px;
  border-radius: 20px;
  background: rgba(255, 255, 255, 0.1);
  border: 2px solid rgba(255, 255, 255, 0);
  overflow: hidden;
  margin-top: 15px;
  transition: all 0.5s ease-in-out;
}

.text:focus {
  outline: 0;
  border: 2px solid rgba(255, 255, 255, 0.5);
  border-radius: 20px;
  background: rgba(0, 0, 0, 0);
}

.text:focus + span {
  opacity: 0.6;
}

input[type="text"],
input[type="password"] {
  font-family: 'Montserrat', sans-serif;
  color: #fff;
}



input {
  display: inline-block;
  padding-top: 20px;
  font-size: 14px;
}

label {
  display: inline-block;
  padding-top: 10px;
  padding-left: 5px;
}

.signin {
  background-color: #1161ed;
  color: #FFF;
  width: 100%;
  /* padding: 10px 20px; */  
  display: block;
  height: 39px;
  border-radius: 20px;
  margin-top: 30px;
  transition: all 0.5s ease-in-out;
  border: none;
  text-transform: uppercase;
}
.signin i{
  font-size: 18px;
}

.signin:hover {
  background: #4082f5;
  box-shadow: 0px 4px 35px -5px #4082f5;
  cursor: pointer;
}

.signin:focus {
  outline: none;
}

hr {
  border: 1px solid rgba(255, 255, 255, 0.1);
  top: 85px;
  position: relative;
}

a {
  text-align: center;
  display: block;
  top: 120px;
  position: relative;
  text-decoration: none;
  color: rgba(255, 255, 255, 0.2);
}  
@media screen and (max-width: 900px) {
    .login {
  position: relative;
  height: 560px;
  max-width: 66%;
  margin: auto;
  padding: 30px 30px 30px 30px;
  background-size: cover;
  box-shadow: 0px 30px 60px -5px #000;
}
form {
    margin: 10px;
  padding-top: 30px;
}

}
</style>
</head>
<body>




<?php
include('config.php');
session_start();
error_reporting(0);







//  كود تسجيل الدخول لحساب جوجل 

//index.php


$login_button = '';

//This $_GET["code"] variable value received after user has login into their Google Account redirct to PHP script then this variable value has been received
if(isset($_GET["code"]))
{
 //It will Attempt to exchange a code for an valid authentication token.
 $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

 //This condition will check there is any error occur during geting authentication token. If there is no any error occur then it will execute if block of code/
 if(!isset($token['error']))
 {
  //Set the access token used for requests
  $google_client->setAccessToken($token['access_token']);

  //Store "access_token" value in $_SESSION variable for future use.
  $_SESSION['access_token'] = $token['access_token'];

  //Create Object of Google Service OAuth 2 class
  $google_service = new Google_Service_Oauth2($google_client);

  //Get user profile data from google
  $data = $google_service->userinfo->get();

  //Below you can find Get profile data and store into $_SESSION variable
  if(!empty($data['given_name']))
  {
   $_SESSION['user_first_name'] = $data['given_name'];
  }

  if(!empty($data['family_name']))
  {
   $_SESSION['user_last_name'] = $data['family_name'];
  }

  if(!empty($data['email']))
  {
   $_SESSION['user_email_address'] = $data['email'];
  }

  if(!empty($data['gender']))
  {
   $_SESSION['user_gender'] = $data['gender'];
  }

  if(!empty($data['picture']))
  {
   $_SESSION['user_image'] = $data['picture'];
  }
 }
 ?> <script type='text/javascript'> document.location = 'Action.php'; </script> <?php
}

//This is for check user has login into system by using Google account, if User not login into system then it will execute if block of code and make code for display Login link for Login using Google account.



  if(!isset($_SESSION['access_token']))
  {
   //Create a URL to obtain user authorization
   $login_button = '<a class="signin" style="padding-top: 17px;" href="'.$google_client->createAuthUrl().'">الدخول بستخدام حساب جوجل <i class="fa fa-google" aria-hidden="true"></i></a>';
  
  }
  


//  كود تسجيل الدخول لحساب جوجل انتهى 



if (isset($_POST['login'])) {
    $email = $_POST['username'];
    $password = md5($_POST['password']);
    $sql = "SELECT id,fullname,email,password FROM users WHERE type='Admin' and email=:email AND password=:password";
    $query = $dbh->prepare($sql);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_OBJ);
    //في حالة تطابق البيانات المدخلة مع الموجودة بقاعدة البيانات ف اعرض صفحة مدير المنشورات 
    if ($query->rowCount() > 0) {
                 
        // $currentpage = $_SESSION['redirectURL'];
       
          foreach ($result as $result) {
            $_SESSION['login'] = $_POST['username'];
            $_SESSION['login_userid_manga'] = htmlentities($result->id);
            $_SESSION['fullname'] = htmlentities($result->fullname);                       
          }            

        // echo "<script type='text/javascript'> document.location = 'welcome.php'; </script>";    
       header("location: welcome.php");
    }
    else {
        //اذا كانت المعلومات خاطئة اطبع هذة الرسالة
        echo "<script>alert('Invalid Details');</script>";
        
    }
}

if (isset($_POST["btn_reg"])){  
    header("location: ../index.php");
}


?>




<form class="user" method="post" id="userform" name="userlogin" onsubmit="return validate();" novalidate>
<div class="login">
  <h2 class="active"> نافذة تسجيل الدخول</h2>

  <!-- <h2 class="nonactive"> نافذة انشاء الحساب </h2> -->

    <input type="text" class="text" name="username">
     <span>اسم المستخدم</span>

    <br><br>

    <input type="password" class="text" name="password">
    <span>كلمة المرور</span>
    <br>      
    <button class="signin" name="login">
      الدخول
    </button>

    
    <!-- حساب جوجل  -->
    <?php
       echo $login_button;
     ?>
   
    <hr>
    
    <br> <br>  <br>  <br>  
    
    <button class="signin" name="btn_reg">
    العودة الى القائمة الرئيسية
    </button>


    <?php            
    // بدا الجلسة الجديدة
        if (!strlen($_SESSION['login_userid_manga']) == 0) {     
        ?>  <a href="../admin/logout.php" class="signin" style="margin-top:-230px;padding-top: 16px;">تسجيل الخروح</a> <?php
        }
        ?>   

</div>
</form>

</body>
</html>
