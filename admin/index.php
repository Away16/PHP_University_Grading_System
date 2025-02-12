<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../bootstrap/css/docs.min.css">
<link rel="stylesheet" href="../style.css">
<script src="../jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<style>
@font-face {
  font-family: 'vazir';
  src: url('../bootstrap/fonts/Vazir.eot') format('eot'),  
       url('../bootstrap/fonts/Vazir.woff') format('woff'),
       url('../bootstrap/fonts/Vazir.ttf') format('truetype');  
  font-style:normal;
  font-weight:normal;
}

</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>پنل مدیریت</title>
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
                 <a href="../admin/" class="list-group-item active" >پنل مدیریت</a>
                    <a href="../admin/ostad_list.php" class="list-group-item">ویرایش و حذف لیست اساتید</a>
                    <a href="../admin/create.php" class="list-group-item">ایجاد نام کاربری برای استاد</a>
                    <a href="../admin/view_course_by_ostad.php" class="list-group-item">مشاهده نمرات بر اساس استاد</a>

                    <a href="../admin/view_course_by_name.php" class="list-group-item">مشاهده نمرات بر اساس درس</a>
                    
                         <a href="../admin/import.php" class="list-group-item">درج فایل اکسل نمرات</a>

                    <a href="../admin/delete_grades_by_ostad_name.php" class="list-group-item">حذف نمرات بر اساس استاد</a>
                  <a href="../admin/delete_all.php" class="list-group-item">حذف همه نمرات</a>
                         <a href="../admin/change_pwd.php" class="list-group-item">تغییر پسورد مدیر سایت</a> 
                        
                            <a href="../admin/sign_out.php" class="list-group-item">خروج از سایت</a>
                </div>
            </div></div> <div class="menul" >
  
            





                <?php } ?>
                
  <div id="lcontainer"  align="center" style="width:94%; min-height:400px;  float:none;" >

              
                
 <?php
if(isset($_SESSION['admin']) && $_SESSION['admin'] == true)
{ 

echo '<h3 class="form-signin-heading" >به پنل مدیریت خوش آمدید</h3>
			  <hr class="colorgraph"><br>
<br />




<div    style="font-family:vazir; font-size:24px">

   
   <table style="vertical-align:text-bottom" >
   <tr >
   <td><div class="bs-glyphicons"> <ul class="bs-glyphicons-list" > <a href="../admin/view_course_by_name.php"><li style="width:202px; height:130px"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> <span class="glyphicon-class" style="width:180px; height:80px"><font size="+1">مشاهده نمرات بر اساس درس</font></span> </li> </a></ul></div> </td>
   <td><div class="bs-glyphicons"> <ul class="bs-glyphicons-list" > <a href="../admin/view_course_by_ostad.php"><li style="width:202px; height:130px"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> <span class="glyphicon-class" style="width:180px; height:80px" ><font size="+1">مشاهده نمرات بر اساس استاد</font></span> </li> </a></ul></div>  </td>
 
   <td > <div class="bs-glyphicons"> <ul class="bs-glyphicons-list" > <a href="../admin/create.php"><li style="width:202px; height:130px"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> <span class="glyphicon-class" style="width:180px; height:80px"><font size="+1">ایجاد نام کاربری برای استاد</font></span> </li> </a></ul></div></td>
   <td> <div class="bs-glyphicons"> <ul class="bs-glyphicons-list" > <a href="../admin/ostad_list.php"><li style="width:202px; height:130px"><span class="glyphicon  glyphicon-edit" aria-hidden="true"></span> <span class="glyphicon-class" style="width:180px; height:80px"><font size="+1">ویرایش و حذف لیست اساتید</font></span> </li> </a></ul></div></td>
   </tr>
      
   <tr >
   
   <td><div class="bs-glyphicons"> <ul class="bs-glyphicons-list" > <a href="../admin/change_pwd.php"><li style="width:202px; height:130px"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <span class="glyphicon-class" style="width:180px; height:80px" ><font size="+1">تغییر پسورد مدیر سایت</font></span> </li> </a></ul></div>  </td>
 
   <td > <div class="bs-glyphicons"> <ul class="bs-glyphicons-list" > <a href="../admin/delete_all.php"><li style="width:202px; height:130px"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> <span class="glyphicon-class" style="width:180px; height:80px"><font size="+1">حذف همه نمرات</font></span> </li> </a></ul></div></td>
   <td> <div class="bs-glyphicons"> <ul class="bs-glyphicons-list" > <a href="../admin/delete_grades_by_ostad_name.php"><li style="width:202px; height:130px"><span class="glyphicon  glyphicon-remove" aria-hidden="true"></span> <span class="glyphicon-class" style="width:180px; height:80px"><font size="+1">حذف نمرات بر اساس استاد</font></span> </li> </a></ul></div></td>
   
   <td ><div class="bs-glyphicons" > <ul class="bs-glyphicons-list" > <a href="../admin/import.php"><li style="width:202px; height:130px"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> <span class="glyphicon-class" style="width:180px; height:80px"><font size="+1">درج فایل اکسل نمرات</font></span> </li> </a></ul></div> </td>
   </tr>
   
   </table>      
  <div > 

';




















} else echo    ' <div id="inner"  class="alert alert-danger" role="alert" style="width:420px;"  align="center"   >
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only"></span><br>
  شما مجوز ورود به این بخش را ندارید
</div>   '; ?>               







</body>
</html>