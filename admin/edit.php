<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../style.css">
<script src="../jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ویرایش مشخصات استاد</title>
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
{

				?>
                 <div class="menur">
    
  
            <div class="col-md-2" align="center" dir="rtl">
                <p class="lead" style="font-family:Tahoma" align="center" >منوی مدیریت</p>
                <div class="list-group"  >
                	<a href="../admin/" class="list-group-item" >پنل مدیریت</a>
                    <a href="../admin/ostad_list.php" class="list-group-item active">ویرایش و حذف لیست اساتید</a>
                    <a href="../admin/create.php" class="list-group-item">ایجاد نام کاربری برای استاد</a>
                    <a href="../admin/view_course_by_ostad.php" class="list-group-item">مشاهده نمرات بر اساس استاد</a>

                    <a href="../admin/view_course_by_name.php" class="list-group-item">مشاهده نمرات بر اساس درس</a>
 <a href="../admin/import.php" class="list-group-item">درج فایل اکسل نمرات</a>
                    <a href="../admin/delete_grades_by_ostad_name.php" class="list-group-item">حذف نمرات بر اساس استاد</a>
                        <a href="../admin/delete_all.php" class="list-group-item">حذف همه نمرات</a>
                         <a href="../admin/change_pwd.php" class="list-group-item">تغییر پسورد مدیر سایت</a> 
                        
                            <a href="../admin/sign_out.php" class="list-group-item">خروج از سایت</a>
                </div>
            </div></div><div class="menul" >
  
            
         <?php       }   ?>   		
	
<div id="lcontainer"  align="center" style="width:94%; min-height:400px;  float:none;" >

<table   width="85%" dir="rtl" class="table table-striped">
 
  
	
			<?php		
		if(isset($_SESSION['admin']) && $_SESSION['admin'] == true)
{	
			
			

require("../db.php");
$id =$_REQUEST['id'];
$result = mysql_query("SELECT * FROM ostad_login WHERE id  = '$id'");
$record = mysql_fetch_array($result);
if (!$result) 
		{
		die('<div id="inner"  class="alert alert-danger" role="alert" style="width:420px;"  align="center"   >
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only">Error:</span>
  خطایی در انجام عملیات درخ داده است
</div> ');
		}
	            $ostad_name=$record['ostad_name'] ;
				$ostad_user=$record['user'] ;
				$ostad_pass=$record['pass'] ;

if(isset($_POST['save']))
{	
	$ostad_name_save = $_POST['ostad_name'];
	$ostad_pass_save = $_POST['pass'];
	
//$r="UPDATE grades SET ostad_name ='$ostad_name_save', pass ='$ostad_pass_save' WHERE id = '$id'";
//echo $r;
if(!$_POST['pass'])
{
mysql_query("UPDATE ostad_login SET ostad_name ='$ostad_name_save' WHERE id = '$id'");
			//	or die('<br>'.mysql_error()); 
	if (mysql_error()){
					
				echo '    <div id="inner"  class="alert alert-danger" role="alert" style="width:420px;"  align="center"   >
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only">Error:</span>
  خطایی در انجام عملیات درخ داده است
</div>  
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<form action="../admin/ostad_list.php">
    <input type="submit" value="بازگشت به عقب" class="btn btn-primary" >
</form>

 ';	   die('');
					 
					 
					  } else
	echo "پیام با موفقیت ثبت شد";
} else



{

	mysql_query("UPDATE ostad_login SET ostad_name ='$ostad_name_save', pass ='".sha1($ostad_pass_save)."' WHERE id = '$id'") ;
			//	or die('<br>'.mysql_error()); 
if (mysql_error()){
					
				echo '    <div id="inner"  class="alert alert-danger" role="alert" style="width:420px;"  align="center"   >
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only">Error:</span>
  خطایی در انجام عملیات درخ داده است
</div>  
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<form action="../admin/ostad_list.php">
    <input type="submit" value="بازگشت به عقب" class="btn btn-primary" >
</form>

 ';	   die('');
					 
					 
					  } else
	echo "پیام با موفقیت ثبت شد";			
			

}







	header("Location: ostad_list.php");			
}
mysql_close($conn);




?>



<form method="post" >
<table dir="rtl">

	<h4 class="form-signin-heading">ویرایش مشخصات استاد</h4>
		<hr class="colorgraph">
  <div class="alert alert-info" role="alert">در صورتی که قصد تغییر رمزعبور را ندارید،فیلد مربوط به رمزعبور را خالی بگذارید</div>
	<tr>
		<td>نام استاد:</td>
		<td>
        
<input type="text" name="ostad_name" value="<?php echo $ostad_name ?>" class="form-control"/>

        
</td>
	</tr>
	<tr>
		<td>نام کاربری:</td>
		<td>
        
<input type="text" name="ostad_user" value="<?php echo $ostad_user ?>" class="form-control" disabled="disabled"/>

        
</td>
	</tr>
	<tr>
		<td >پسورد جدید استاد:</td>
		<td><input type="password" name="pass" class="form-control"/></td>
	</tr>
	
	<tr>
		<td >&nbsp;<br /><br /><br /></td>
		<td dir="ltr"><input type="submit" name="save" value="ذخیره تغییرات" class="btn btn-success"/></td>
	</tr>
</table>




<?php   }
else { echo  '    <div id="inner"  class="alert alert-danger" role="alert" style="width:420px;"  align="center"   >
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only"></span><br>
  شما مجوز ورود به این بخش را ندارید
</div>   ';}  ?>







</body>
</html>