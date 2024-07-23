<?php
session_set_cookie_params(0);
session_start();
include('config.php');
// اذا لم يتم تسجيل الدخول
if (strlen($_SESSION['login']) == 0) {
    // افتح الصفحة التالية
    header('location: admin.php');
} else {
    // كود حذف الرسائل المرسلة
    
?>

    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>Manage Posts</title>
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
        .container {
                width: 90%;
            }   
            table {
                max-width: 100%;
            }
            table th{
                    font-size: 10px;
                }

                table td {
                    font-size: 12px;
                    text-align: center;
                }
}   
        </style>
    </head>

    <body>



            <div class="row">

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