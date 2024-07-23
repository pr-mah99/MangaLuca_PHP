<?php

include('../admin/config.php');
session_start();
    $fname = $_SESSION['user_first_name'];
    $lname = $_SESSION['user_last_name'];
    $fullname=$fname . ' ' .  $lname;
    $email = $_SESSION['user_email_address'];
    $type = 'user';
    $image1 = $_SESSION["user_image"];

    // echo "<script>alert('$lname')</script>";

    // كود التاكد من وجود الحساب
    $email = $_SESSION['user_email_address'];
    $sql = "SELECT id,fullname,email FROM users WHERE type='user' and email=:email";
    $query = $dbh->prepare($sql);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_OBJ);
    $public_id="";
    //في حالة تطابق البيانات المدخلة مع الموجودة بقاعدة البيانات ف اعرض صفحة مدير المنشورات 
    foreach ($result as $result) {                          
        $public_id= htmlentities($result->id);      
    }

    if ($query->rowCount() > 0) {

                   
      $_SESSION['login_userid_manga'] =  $public_id;   
      $_SESSION['fullname'] =  $fname .' '. $lname;       
    //   echo "<script>alert('$public_id')</script>"; 
        echo "<script type='text/javascript'> document.location = '../index.php'; </script>";    
        // echo "Login Sucessful";
    }  
    else {
        
try{
    // كود اضافةالحساب في قاعدة بيانات اذا كان غير موجود 
    $sql = "INSERT INTO users(fullname,email,image1,type) VALUES(:fullname,:email,:image1,:type)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':fullname', $fullname, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':type', $type, PDO::PARAM_STR);
    $query->bindParam(':image1', $image1, PDO::PARAM_STR);
      
    // تنفيذ الاستعلام
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();
    if ($lastInsertId) {
          $_SESSION['login_userid'] =  $public_id;                           
         echo "<script>alert('Added Information To Users');document.location = 'Action.php';</script>";
    } else {
        echo "<script>alert('Something went wrong')</script>";
    }
}
    catch(PDOException $e){
        echo $sql . "<br>" . $e->getMessage();
    }

}


    
    
?>