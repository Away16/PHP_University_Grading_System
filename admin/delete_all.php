<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../style.css">
<script src="../jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>حذف همه نمرات</title>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
    
      <a class="navbar-brand" href="../" style="color:#FFF">سامانه اعتراض به نمرات</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    
    
      <ul class="nav navbar-nav navbar-right">
        <li><a href="https://edu.uast.ac.ir/">سامانه سجاد</a></li>
        <li class="active"><a href="../">صفحه اصلی <span class="sr-only">(current)</span></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">دسترسی سریع <span class="caret"></span></a>
          <ul class="dropdown-menu" >
            <li style="text-align:center"><a href="../student/login.php">ورود دانشجویان</a></li>
            <li style="text-align:center"><a href="../panel/login.php">ورود استاد</a></li>
            <li style="text-align:center"><a href="../admin/login.php">ورود بعنوان مدیر سیستم</a></li>
            <li role="separator" class="divider"></li>
            <li style="text-align:center"><a href="../about.php">درباره سایت</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>









<div class="wrapper">

















<?php
session_start();
if(isset($_SESSION['admin']) && $_SESSION['admin'] == true)
{   ?>

    <div class="menur">
    
  
            <div class="col-md-2" align="center" dir="rtl">
                <p class="lead" style="font-family:Tahoma" align="center" >منوی مدیریت</p>
                <div class="list-group"  >
                	<a href="../admin/" class="list-group-item" >پنل مدیریت</a>
                    <a href="../admin/ostad_list.php" class="list-group-item">ویرایش و حذف لیست اساتید</a>
                    <a href="../admin/create.php" class="list-group-item">ایجاد نام کاربری برای استاد</a>
                    <a href="../admin/view_course_by_ostad.php" class="list-group-item">مشاهده نمرات بر اساس استاد</a>

                    <a href="../admin/view_course_by_name.php" class="list-group-item">مشاهده نمرات بر اساس درس</a>
                          <a href="../admin/import.php" class="list-group-item">درج فایل اکسل نمرات</a>

                    <a href="../admin/delete_grades_by_ostad_name.php" class="list-group-item">حذف نمرات بر اساس استاد</a>
                        <a href="../admin/delete_all.php" class="list-group-item active">حذف همه نمرات</a>
                         <a href="../admin/change_pwd.php" class="list-group-item">تغییر پسورد مدیر سایت</a> 
                        
                            <a href="../admin/sign_out.php" class="list-group-item">خروج از سایت</a>
                </div>
            </div></div> <div class="menul" >
  
            





                <?php } ?>
                
  <div id="lcontainer"  align="center" style="width:94%; min-height:400px;  float:none;" >

              
                
 <?php
if(isset($_SESSION['admin']) && $_SESSION['admin'] == true)
{  ?>               
<div class="alert alert-info" role="alert">             
    در صورتی که اطلاعات در اطلاعات ورودی شما مشکلی وجود دارد میتوانید در اینجا  نمرات همه دانشجویان را حذف کنید  </div>
    
    <div  align="center">
    <div class="alert alert-warning" role="alert" style="width:520px">
لطفا دقت کنید.در صورت حذف اشتباه ، نمرات قابل بازگشت نخواهند بود
    </div></div>
                
    <form action="" method="post" dir="rtl" >

<input name="_delete_" dir="rtl" type="submit" class="btn btn-danger"  value="حذف تمامی نمرات" onclick="return confirm('آیا مطمئن هستید میخواهید نمرات را حذف کنید؟این عمل غیر قابل بازگشت خواهد بود')" >   <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
</form>            
    <br />           
                
                

<?php


if (isset($_POST['_delete_'])){
 include("../db.php");
$result=mysql_query("DELETE FROM grades");
	if (!$result){
		
	 die('<div class="alert alert-danger" role="alert" style="width:420px;"  align="center"   >
  <span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span>
  <span class="sr-only"></span><br><br>
خطایی  در حذف اطلاعات رخ داده است رخ داده است</div>  
<form action="../admin/">
    <input type="submit" value="بازگشت به عقب" class="btn btn-primary" >
</form>
'); 	
		
		} else {
			echo '<br><div   class="alert alert-success" role="alert" style="width:420px;"  align="center"  >
  <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
  <span class="sr-only">Error:</span> <br><br>  اطلاعات همه دانشجویان ، با موفقیت پاک شدند </div>';
			}
}


} else  echo    ' <div id="inner"  class="alert alert-danger" role="alert" style="width:420px;"  align="center"   >
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only"></span><br>
  شما مجوز ورود به این بخش را ندارید
</div>   ';

?>









</body>
</html>