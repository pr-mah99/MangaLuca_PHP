<!-- لوحة تحكم الخاصة بالمنشورات -->
<?php
session_set_cookie_params(0);
// بدا الجلسة الجديدة
session_start();
// أستدعاء كود اتصال بقاعدة البيانات
// include('config.php');
if (strlen($_SESSION['login']) == 0) {
    header('location: admin.php');
} else {
   

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>

<style>
     /* carduser */
     @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Bree+Serif&family=EB+Garamond:ital,wght@0,500;1,800&display=swap');

*{
    /* text-align: right; */
    text-justify:distribute-all-lines;
}
body {
background: #DFC2F2;
	background-image: linear-gradient( to right, #ffffb3,#ffe6e6);
	background-attachment: fixed;	
	background-size: cover;
  
	}

#container{
	box-shadow: 0 15px 30px 1px grey;
	background: rgba(255, 255, 255, 0.90);
	text-align: center;
	border-radius: 5px;
	overflow: hidden;
	margin: 5em auto;
	height: 350px;
	width: 700px;
  
	
}



.product-details {
	position: relative;
	text-align: left;
	overflow: hidden;
	padding: 30px;
	height: 100%;
	float: left;
	width: 40%;

}

#container .product-details h1{
	font-family: 'Bebas Neue', cursive;
	display: inline-block;
	position: relative;
	font-size: 30px;
	color: #344055;
	margin: 0;
	
}

#container .product-details h1:before{
	position: absolute;
	content: '';
	right: 0%; 
	top: 0%;
	transform: translate(25px, -15px);
	font-family: 'Bree Serif', serif;
	display: inline-block;
	background: #ffe6e6;
	border-radius: 5px;
	font-size: 14px;
	padding: 5px;
	color: white;
	margin: 0;
	animation: chan-sh 6s ease infinite;

}



	


.hint-star {
	display: inline-block;
	margin-left: 0.5em;
	color: gold;
	width: 50%;
}


#container .product-details > p {
font-family: 'EB Garamond', serif;
	text-align: center;
	font-size: 18px;
	color: #7d7d7d;
	
}
.control{
	position: absolute;
	bottom: 20%;
	left: 22.8%;
	
}
.btn {

	transform: translateY(0px);
	transition: 0.3s linear;
	background:  #809fff;
	border-radius: 5px;
  position: relative;
  overflow: hidden;
	cursor: pointer;
	outline: none;
	border: none;
	color: #eee;
	padding: 0;
	margin: 0;
	
}

.btn:hover{transform: translateY(-6px);
	background: #1a66ff;}

.btn span {
	font-family: 'Farsan', cursive;
	transition: transform 0.3s;
	display: inline-block;
  padding: 10px 20px;
	font-size: 1.2em;
	margin:0;
	
}
.btn .price, .shopping-cart{
	background: #333;
	border: 0;
	margin: 0;
}

.btn .price {
	transform: translateX(-10%); padding-right: 15px;
}

.btn .shopping-cart {
	transform: translateX(-100%);
  position: absolute;
	background: #333;
	z-index: 1;
  left: 0;
  top: 0;
}

.btn .buy {z-index: 3; font-weight: bolder;}

.btn:hover .price {transform: translateX(-110%);}

.btn:hover .shopping-cart {transform: translateX(0%);}



.product-image {
	transition: all 0.3s ease-out;
	display: inline-block;
	position: relative;
	overflow: hidden;
	height: 100%;	
	width: 45%;
	display: inline-block;
    float: right;
}

#container img {width: 100%;height: 100%;}

.info {
    background: rgba(27, 26, 26, 0.9);
    font-family: 'Bree Serif', serif;
    transition: all 0.3s ease-out;
    transform: translateX(-100%);
    position: absolute;
    line-height: 1.8;
    text-align: left;
    font-size: 105%;
    cursor: no-drop;
    color: #FFF;
    height: 100%;
    width: 100%;
    left: 0;
    top: 0;
}

.info h2 {text-align: center}
.product-image:hover .info{transform: translateX(0);}

.info ul li{transition: 0.3s ease;}
.info ul li:hover{transform: translateX(50px) scale(1.3);}

.product-image:hover img {transition: all 0.3s ease-out;}
.product-image:hover img {transform: scale(1.2, 1.2);}



@media screen and (max-width: 900px) {
	html,body{
		overflow: hidden;
	}
	#container{
		margin-top: 150px;
	}

}
</style>
</head>
<body>
    <center>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div id="container">	
	
	<div class="product-details">
		
	<h1>مرحبا بك - Welcome</h1>
	<span class="hint-star star">
		<i class="fa fa-star" aria-hidden="true"></i>
		<i class="fa fa-star" aria-hidden="true"></i>
		<i class="fa fa-star" aria-hidden="true"></i>
		<i class="fa fa-star" aria-hidden="true"></i>
		<i class="fa fa-star-o" aria-hidden="true"></i>
	</span>



	<div class="control">	
			<p class="information">" انت الان في منصب مدير الادارة موقع المانجا يمكنك التحكم الكامل في الموقع من اضافة مانجا جديدة او تعديل بيانات او حتى حذف المانجا من قاعدة البيانات، نذكر للتنويه انة هذة المسؤؤلية كبيرة يرجى الانتباة وعدم اساءة التصرف ضمن صلاحياتك ك مستخدم.</p>

            <p><?php echo $_SESSION['fullname'] ?> <br> <?php echo $_SESSION['login'] ?></p>
 
<br><br>
    </div>

    
		
<div class="control">
	<a href="Manga/manage-manga.php">
	<button class="btn">
	<span class="price">هل انت جاهز</span>
   <span class="shopping-cart"><i class="fa fa-play" aria-hidden="true"></i></span>
   <span class="buy">بدا ادارة المانجا</span>
 </button>
 </a>
	
</div>
			

			
</div>


<div class="product-image">
	
	<img src="../img/welcome.jpg" alt="">
	

<div class="info">
	<h2> الصلاحيات المتوفرة</h2>
	<ul> 
		<li><strong>أدارة مانجا : </strong><font color="#1699FF">مسموح</font></li>
		<li><strong>عرض رسائل المستخدمين : </strong><font color="#1699FF">مسموح</font></li>
		<li><strong>الاطلاع على الطلبات: </strong><font color="#1699FF">مسموح</font></li>
		<li><strong>اضافة مستخدم جديد: </strong><font color="#FF746F">غير مسموح</font></li>
		
	</ul>
</div>
</div>

</div>

<div class="control2" style="margin-top: 22px;">
<br>
	<a href="../index.php">
	<button class="btn" style="background-color: rgb(0, 150, 135);">
	<span class="price">هل تريد مراجعة عملك؟</span>
   <span class="shopping-cart" style="background-color: rgb(0, 150, 135);"><i class="fa fa-sign-out" aria-hidden="true"></i></span>
   <span class="buy" style="background-color: rgb(0, 150, 135);">العودة الى القائمة الرئيسية</span>
 </button>
 </a>
	
</div>
<div class="control2" style="margin-top: 22px;">
<br>
	<a href="logout.php">
	<button class="btn" style="background-color: red;">
	<span class="price">هل انهيت عملك؟</span>
   <span class="shopping-cart" style="background-color: red;"><i class="fa fa-sign-out" aria-hidden="true"></i></span>
   <span class="buy" style="background-color: red;">تسجيل الخروج</span>
 </button>
 </a>
	
</div>


</center>

    
</body>
</html>

<?php } ?>