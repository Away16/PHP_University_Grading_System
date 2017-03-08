<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../style.css">
<script src="../jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ایجاد نام کاربری استاد</title>
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
                    <a href="../admin/ostad_list.php" class="list-group-item">ویرایش و حذف لیست اساتید</a>
                    <a href="../admin/create.php" class="list-group-item active">ایجاد نام کاربری برای استاد</a>
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

 
  
	
			<?php		
		if(isset($_SESSION['admin']) && $_SESSION['admin'] == true)
{	
	
	
include("../db.php");

if($_SERVER['REQUEST_METHOD'] != 'POST')
{

    echo '
	
	<h4 class="form-signin-heading">ویرایش مشخصات استاد</h4>
		<hr class="colorgraph">

	
	<form method="post" action=""  dir="rtl">
		<table dir="rtl" >
		<tr ><td>نام استاد: </td> <td dir="ltr"> <input type="text" name="ostad_name" class="form-control"/> </td></tr>
 	 	<tr><td>نام کاربری: </td> <td dir="ltr"><input type="text" name="user_name" class="form-control"/></td></tr>
 		<tr><td>رمزعبور:  </td> <td dir="ltr"><input type="password" name="user_pass" class="form-control"></td></tr>
		<tr ><td >تکرار رمزعبور:</td > <td dir="ltr"><input type="password" name="user_pass_check" class="form-control"></td></tr>
		
	
		<tr dir="ltr">
		<td >&nbsp;</td>
		
		<td><input type="submit" value="ایجاد نام کاربری استاد" class="btn btn-success"/></td></tr> 
 	 </table>    </form>    ';
}
else
{

	$errors = array();
	
	if(isset($_POST['user_name']))
	{

		if(!ctype_alnum($_POST['user_name']))
		{
			$errors[] = 'نام کاربری فقط میتواند شامل حروف و اعداد باشد';
		}
		if(strlen($_POST['user_name']) > 50)
		{
			$errors[] = 'نام کاربری نمیتواند بیشتر از 50 کاراکتر باشد';
		}
	}
	else
	{
		$errors[] = 'لطفا نام کاربری را وارد کنید';
	}
	
	
	if (!$_POST['ostad_name']){
		
		$errors[]="لطفا نام استاد را وارد کنید";
		
	}
	
	if (!$_POST['user_pass'])  {  $errors[] = 'پسورد نمیتواند خالی باشد';}
	
	if (!$_POST['user_pass_check'])  {  $errors[] = 'پسورد نمیتواند خالی باشد';}
	
	if(isset($_POST['user_pass']))
	{
		if($_POST['user_pass'] != $_POST['user_pass_check'])
		{
			$errors[] = 'پسوردها با هم یکسان نیستند';
		}
	}
	else
	{
		$errors[] = 'پسورد نمیتواند خالی باشد';
	}
	
	if(!empty($errors))
	{
		echo '
					
					<div id="inner"  class="alert alert-danger" role="alert" style="width:420px;"  align="center"   >
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only">Error:</span> <br>';
		echo '<ul dir="rtl">';
		foreach($errors as $key => $value) 
		{
			echo '<li>' . $value . '</li>'; 
		}
		echo '</ul></div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<form action="../admin/create.php">
    <input type="submit" value="بازگشت به عقب" class="btn btn-primary" >
</form>';
	}
	else
	{

		$sql = "INSERT INTO
					ostad_login(ostad_name,user, pass)
				VALUES('" . mysql_real_escape_string($_POST['ostad_name']) . "','" . mysql_real_escape_string($_POST['user_name']) . "',
					   '" . sha1($_POST['user_pass']) . "')";
						
		$result = mysql_query($sql);
		if(!$result)
		{ //echo $sql ."<br>";


			echo '
					
					<div id="inner"  class="alert alert-danger" role="alert" style="width:420px;"  align="center"   >
  <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
  <span class="sr-only"></span><br>
خطایی در انجام عملیات رخ داده است
</div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<form action="../admin/create.php">
    <input type="submit" value="بازگشت به عقب" class="btn btn-primary" >
</form></div>


';
			echo '<br>';
			//die(mysql_error());
		}
		else
		{
			echo '
							<div id="inner"  class="alert alert-success" role="alert" style="width:420px;"  align="center"   >
  <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
  <span class="sr-only">Error:</span><br><br>نام کاربری استاد با موفقیت ساخته شد</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  
  
  <form action="../admin/">
  
    <input type="submit" value="بازگشت به پنل مدیریت" class="btn btn-primary" >
</form></div>';
		}
	}
} 
}
else { echo '  <div id="inner"  class="alert alert-danger" role="alert" style="width:420px;"  align="center"   >
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only"></span><br>
  شما مجوز ورود به این بخش را ندارید
</div>   ';                }

?>









































</body>
</html>