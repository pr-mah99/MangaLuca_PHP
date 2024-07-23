<?php
      session_set_cookie_params(0);
      session_start();   
    // Headerاستدعاء ملف ال 
    include("Header.php");
    ?>

<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- css Slider Start  -->
    <link rel="stylesheet" href="Slider/TEXT.css">
    <!-- css Sliser End  -->

    <title>Manga Luca - مانجا لوكا</title>
    <style> 
/* <!-- icons socal media Start --> */
@import url('https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400');

.continer_socalmedia *{   
    display:block
}

.continer_socalmedia ul {
    font-family: 'Roboto Condensed', sans-serif;
    font-weight: 600;
  position:absolute;
  top:130%;
  left:50%;
  transform:translate(-50%, -50%);
  display:flex;
  margin:0;
  padding:0;
}

.continer_socalmedia ul li {
  list-style:none;
  margin:0 5px;
}

.continer_socalmedia ul li a .fa {
  font-size: 40px;
  color: #262626;
  line-height:80px;
  transition: .5s;
  padding-right: 14px;
}

.continer_socalmedia ul li a span {
  padding:0;
  margin:0;
  position:absolute;
  top: 30px;
  color: #262626;
  letter-spacing: 4px;
  transition: .5s;
}

.continer_socalmedia ul li a {
  text-decoration: none;
  display:absolute;
  display:block;
  width:210px;
  height:80px;
  background: #fff;
  text-align:left;
  padding-left: 20px;
  transform: rotate(-30deg) skew(25deg) translate(0,0);
  transition:.5s;
  box-shadow: -20px 20px 10px rgba(0,0,0,.5);
}
.continer_socalmedia ul li a:before {
  content: '';
  position: absolute;
  top:10px;
  left:-20px;
  height:100%;
  width:20px;
  background: #b1b1b1;
  transform: .5s;
  transform: rotate(0deg) skewY(-45deg);
}
.continer_socalmedia ul li a:after {
  content: '';
  position: absolute;
  bottom:-20px;
  left:-10px;
  height:20px;
  width:100%;
  background: #b1b1b1;
  transform: .5s;
  transform: rotate(0deg) skewX(-45deg);
}

.continer_socalmedia ul li a:hover {
  transform: rotate(-30deg) skew(25deg) translate(20px,-15px);
  box-shadow: -50px 50px 50px rgba(0,0,0,.5);
}

.continer_socalmedia ul li:hover .fa {
  color:#fff;
}

.continer_socalmedia ul li:hover span {
  color:#fff;
}

.continer_socalmedia ul li:hover:nth-child(1) a{
  background: #3b5998;
}
.continer_socalmedia ul li:hover:nth-child(1) a:before{
  background: #365492;
}
.continer_socalmedia ul li:hover:nth-child(1) a:after{
  background: #4a69ad;
}

.continer_socalmedia ul li:hover:nth-child(2) a{
  background: #00aced;
}
.continer_socalmedia ul li:hover:nth-child(2) a:before{
  background: #097aa5;
}
.continer_socalmedia ul li:hover:nth-child(2) a:after{
  background: #53b9e0;
}

.continer_socalmedia ul li:hover:nth-child(3) a{
  background: #dd4b39;
}
.continer_socalmedia ul li:hover:nth-child(3) a:before{
  background: #b33a2b;
}
.continer_socalmedia ul li:hover:nth-child(3) a:after{
  background: #e66a5a;
}

.continer_socalmedia ul li:hover:nth-child(4) a{
  background: #e4405f;
}
.continer_socalmedia ul li:hover:nth-child(4) a:before{
  background: #d81c3f;
}
.continer_socalmedia ul li:hover:nth-child(4) a:after{
  background: #e46880;
}

@media screen and (max-width: 900px) {
    .dd{
        display: inline;
    }
.continer_socalmedia ul {
  /* top:135%; */
  display: none;
}
}
/* <!-- icons socal media End --> */



        body {
            background-image: radial-gradient(circle, #5a768a, #4d687d, #415971, #354c64, #2a3e58, #253954, #213550, #1c304c, #1b334f, #1a3651, #193954, #183c56);
        }
        .container{
            padding:40px;
            width:100%;
            color: white;
        }
        .paragraph{
            color: white; padding: 40px 150px 10px 150px
        }
      
        @media screen and (max-width: 900px) {
            .container{
                font-size: 12px;   
        }
        .paragraph{
            color: white; padding: 10px 10px 10px 10px
        }       
}
    </style>
</head>

<body>

 

    <div class="lastest container mt-4 mt-sm-5">       
            <div class="col-lg-6">
                <h2 class="font-weight-bolder float-left" >نبذة عن الموقع</h2>
            </div>                      
    </div>      
    <hr>
    <p class="paragraph">
    موقع MangaLuca موقع تفاعلي والاسرع على الاطلاق من بقية المواقع يهدف لتوفير خيارات أكثر لعرض الترجمات العربية لفصول المانجا، ويوفّر كذلك تطبيق الخاص بنا على كافة المنصات , مع امكانية تحميل الفصول وأيضًا قراءتها بعدة طرق ليس هذا فحسب، بل نوفر امكانية رفع المانجا لاصاحب المواهب في تاليف ورسم المانجا وكروب دردشة الموهوبين ونوفر ميزة رفع المانجا لاي شخص وسوف تنشر باسمة وعرض افضل المستخدمين المميزين.</p>
<p>🙂🔥</p>


<div class="lastest container mt-4 mt-sm-5">   
            <div class="col-lg-6">
                <h2 class="font-weight-bolder float-left">من نحن</h2>
            </div>              
    </div>      
    <hr>

    <p class="paragraph">
    نحن فريق متخصص في البرمجة والترجمة المانجا مكون من 8 اشخاص دعمكم لنا هو سبب في استمرار عملنا وسعي دائما نحو التطوير الموقع والتطبيق ليسهل عليكم قراءة المانجا بدون مشاكل او بطئ . نتمنى منكم في سعي دائم للمساهمة في تحسين وتطوير الترجمة العربية للمانجا والمانهو من خلال عرض جميع الترجمات المتوفرة ولا يلتزم بعرض ترجمة واحدة
مساهماتكم من خلال الرفع والمشاركة بالأفكار والملاحظات هي ما نطلبه منكم وشكراً
</p>
<p>🙂🔥</p>

    
<div class="dd" style="float :none; margin-top:293px"></div> <!-- فاصلة  -->


<!-- icons socal media Start -->
<div class="continer_socalmedia" >
<ul>
  <li>
    <a href="#">
      <i class="fa fa-facebook" aria-hidden="true"></i>
      <span> - Facebook</span>
    </a>
  </li>
  <li>
    <a href="#">
      <i class="fa fa-twitter" aria-hidden="true"></i>
      <span> - Twitter</span>
    </a>
  </li>
  <li>
    <a href="#">
      <i class="fa fa-telegram" aria-hidden="true"></i>
      <span> - Telegram</span>
    </a>
  </li>
  <li>
    <a href="#">
      <i class="fa fa-instagram" aria-hidden="true"></i>
      <span> - Instagram</span>
    </a>
  </li>
</div>
<!-- icons socal media End -->



<div class="Contianer" style="direction: rtl;">

<div class="lastest container mt-4 mt-sm-5">   
            <div class="col-lg-6">
                <h2 class="font-weight-bolder float-left">الخصوصية وبيان سريّة المعلومات</h2>
            </div>              
    </div>      
    <hr>

    <p class="paragraph">نقدر مخاوفكم واهتمامكم بشأن خصوصية بياناتكم على شبكة الإنترنت.
لقد تم إعداد هذه السياسة لمساعدتكم في تفهم طبيعة البيانات التي نقوم بتجميعها منكم عند زيارتكم لموقعنا على شبكة الانترنت وكيفية تعاملنا مع هذه البيانات الشخصية.
    </p>
    <h5 class="paragraph"> التصفح : </h5>

    <p class="paragraph">
لم نقم بتصميم هذا الموقع من أجل تجميع بياناتك الشخصية من جهاز الكمبيوتر الخاص بك أثناء تصفحك لهذا الموقع, وإنما سيتم فقط استخدام البيانات المقدمة من قبلك بمعرفتك ومحض إرادتك.
    </p>

<h5 class="paragraph"> عنوان بروتوكول شبكة الإنترنت (IP) : </h5>
<p class="paragraph">
في أي وقت تزور فيه اي موقع انترنت بما فيها موقع مانجا لوكا , سيقوم السيرفر المضيف بتسجيل عنوان بروتوكول شبكة الإنترنت (IP) الخاص بك , تاريخ ووقت الزيارة ونوع متصفح الإنترنت الذي تستخدمه والعنوان URL الخاص بأي موقع من مواقع الإنترنت التي تقوم بإحالتك إلى هذا الموقع على الشبكة.
</p>

<h5 class="paragraph">عمليات المسح على الشبكة : </h5>

<p class="paragraph">
إن عمليات المسح التي نقوم بها مباشرة على الشبكة تمكننا من تجميع بيانات محددة مثل البيانات المطلوبة منك بخصوص نظرتك وشعورك تجاه موقعنا. تعتبر ردودك ذات أهمية قصوى ومحل تقديرنا حيث أنها تمكننا من تحسين مستوى موقعنا, ولك كامل الحرية والإختيار في تقديم البيانات المتعلقة بإسمك والبيانات الأخرى.
</p>

<h5 class="paragraph"> الروابط بالمواقع الأخرى على شبكة الإنترنت : </h5>

<p class="paragraph">
قد يشتمل موقعنا على روابط لمواقع أخرى على شبكة الإنترنت. او اعلانات من مواقع اخرى مثل Google AdSense ولا نعتبر مسؤولين عن أساليب تجميع البيانات من قبل تلك المواقع, يمكنك الاطلاع على سياسات السرية والمحتويات الخاصة بتلك المواقع التي يتم الدخول إليها من خلال أي رابط ضمن هذا الموقع.
نحن قد نستعين بشركات إعلان لأطراف ثالثة لعرض الإعلانات عندما تزور موقعنا على الويب. يحق لهذه الشركات أن تستخدم معلومات حول زياراتك لهذا الموقع ولمواقع الويب الأخرى (باستثناء الاسم أو العنوان أو عنوان البريد الإلكتروني أو رقم الهاتف)، وذلك من أجل تقديم إعلانات حول البضائع والخدمات التي تهمك. إذا كنت ترغب في مزيد من المعلومات حول هذا الأمر وكذلك إذا كنت تريد معرفة الاختيارات المتاحة لك لمنع استخدام هذه المعلومات من قِبل هذه الشركات ، <a href="https://www.google.com/privacy_ads.html" target="_blank">فالرجاء النقر هنا.</a> 
</p>

<h5 class="paragraph"> إفشاء المعلومات : </h5>

<p class="paragraph">
سنحافظ في كافة الأوقات على خصوصية وسرية كافة البيانات الشخصية التي نتحصل عليها. ولن يتم إفشاء هذه المعلومات إلا إذا كان ذلك مطلوباً بموجب أي قانون أو عندما نعتقد بحسن نية أن مثل هذا الإجراء سيكون مطلوباً أو مرغوباً فيه للتمشي مع القانون , أو للدفاع عن أو حماية حقوق الملكية الخاصة بهذا الموقع أو الجهات المستفيدة منه.
</p>

<h5 class="paragraph">
البيانات اللازمة لتنفيذ المعاملات المطلوبة من قبلك :
</h5>

<p class="paragraph">
عندما نحتاج إلى أية بيانات خاصة بك , فإننا سنطلب منك تقديمها بمحض إرادتك. حيث ستساعدنا هذه المعلومات في الاتصال بك وتنفيذ طلباتك حيثما كان ذلك ممكنناً. لن يتم اطلاقاً بيع البيانات المقدمة من قبلك إلى أي طرف ثالث بغرض تسويقها لمصلحته الخاصة دون الحصول على موافقتك المسبقة والمكتوبة ما لم يتم ذلك على أساس أنها ضمن بيانات جماعية تستخدم للأغراض الإحصائية والأبحاث دون اشتمالها على أية بيانات من الممكن استخدامها للتعريف بك.
</p>

<h5 class="paragraph"> عند الاتصال بنا : </h5>

<p class="paragraph">
سيتم التعامل مع كافة البيانات المقدمة من قبلك على أساس أنها سرية . تتطلب النماذج التي يتم تقديمها مباشرة على الشبكة تقديم البيانات التي ستساعدنا في تحسين موقعنا.سيتم استخدام البيانات التي يتم تقديمها من قبلك في الرد على كافة استفساراتك , ملاحظاتك , أو طلباتك من قبل هذا الموقع أو أيا من المواقع التابعة له .
</p>

<h5 class="paragraph"> إفشاء المعلومات لأي طرف ثالث : </h5>

<p class="paragraph">
لن نقوم ببيع , المتاجرة , تأجير , أو إفشاء أية معلومات لمصلحة أي طرف ثالث خارج هذا الموقع, أو المواقع التابعة له.وسيتم الكشف عن المعلومات فقط في حالة صدور أمر بذلك من قبل أي سلطة قضائية أو تنظيمية.
</p>

<h5 class="paragraph">
التعديلات على سياسة سرية وخصوصية المعلومات :
</h5>

<p class="paragraph">
نحتفظ بالحق في تعديل بنود وشروط سياسة سرية وخصوصية المعلومات إن لزم الأمر ومتى كان ذلك ملائماً. سيتم تنفيذ التعديلات هنا او على صفحة سياسة الخصوصية الرئيسية وسيتم بصفة مستمرة إخطارك بالبيانات التي حصلنا عليها , وكيف سنستخدمها والجهة التي سنقوم بتزويدها بهذه البيانات.
</p>

<h5 class="paragraph">الاتصال بنا :</h5>

<p class="paragraph">
إذا كنت بحاجة إلى مزيد من المعلومات أو لديك أية أسئلة عن سياسة الخصوصية ، لا تتردد في الاتصال بنا من خلال صفحة اتصل بنا، أو عبر البريد الالكتروني : admin@mangaluca.com
</p>

<h5 class="paragraph"> اخيرا : </h5>
<p class="paragraph">
سرية وخصوصية البيانات الخاصة بك واهتمامك بها ومخاوفك منها هي امر بالغ الاهمية بالنسبة لنا. نحن نأمل أن يتم تحقيق ذلك من خلال سياسة الخصوصية هذه.
</p>

<h5 class="paragraph">هل تريد تقديم طلب حذف الحساب</h5>
<a href="Delete_My_Account.php">
      <i class="fa fa-clear" aria-hidden="true"></i>
  
      <p class="paragraph" style="font-weight: 900;color:yellow">حذف حسابي وبياناتي</p>

    </a>
<br>
<br>
</div>

<?php
include("Footer.php");
?>

</body>

</html>
