<style>
       @font-face {
        font-family: Tajawal;
        font-family: 'Tajawal', 'Amiri';
        src: url(../webfonts/Tajawal-Regular.ttf);        
    }

    * {
        font-family: Tajawal;
        
    }
    
  /* تضليل تحديد النص */
  *::selection{
    background-color: rgb(0,128,128);
    color: white;
  }
</style>
<!-- تسجيل بحساب جوجل -->


<?php

//config.php

//Include Google Client Library for PHP autoload file
require_once 'Google-api/vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('xxxx.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('xxxx');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://localhost/MangaLuca/admin/admin.php');

//
$google_client->addScope('email');

$google_client->addScope('profile');


?>


<!-- حساب جوجل انتهى -->






<!-- قاعدة البيانات -->
<?php
// DB اكواد الاتصال بقاعدة البيانات.
// اسم سيرفر
define('DB_HOST', 'localhost');
// اسم المستخدم
define('DB_USER', 'root');
// كلمة المرور
define('DB_PASS', '');
// اسم قاعدة البيانات
define('DB_NAME', 'Manga');
// Establish database connection.
try {
    // كود الاتصال
    // dbhتم تسمة متغير الاتصال ب
    $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}
?>

<!-- النوع الثاني -->
<!-- من الاتصال بقاعدة البيانات -->
<!-- وتم استخدام الطريقتين -->
<?php

$sname = "localhost";
$uname = "root";
$password = "";

$db_name = "Manga";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn) {
    echo "Connection failed!";
    exit();
}

?>