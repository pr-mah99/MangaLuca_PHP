<!-- تسجيل الخروج لحساب جوجل -->
<?php

//logout.php

include('config.php');

//Reset OAuth access token
// $google_client->revokeToken();

//Destroy entire session data.
session_destroy();

//redirect page to index.php
header('location: admin.php');

?>

<!-- تسجيل الخروج لحساب جوجل انتهى -->








<!-- //تسجيل الخروج لحساب في قاعدة البيانات -->

<?php
// كود حفظ تسجيل الدحول
session_start();
// بدا جلسة جديدة
//$_SESSION = array();
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    // حفظ تسجيل الدخول
    // ضمن الكوكيز
    setcookie(session_name(), '', time() - 60 * 60,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
unset($_SESSION['login']);
// انهاء الجلسة
session_destroy();
$currentpage = $_SESSION['redirectURL'];
// الرجوع الى القائمة الرئيسية
header("location: admin.php");
