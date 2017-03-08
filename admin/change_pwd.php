<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../style.css">
<script src="../jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>تغییر پسورد</title>
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
                    <a href="../admin/create.php" class="list-group-item">ایجاد نام کاربری برای استاد</a>
                    <a href="../admin/view_course_by_ostad.php" class="list-group-item">مشاهده نمرات بر اساس استاد</a>

                    <a href="../admin/view_course_by_name.php" class="list-group-item">مشاهده نمرات بر اساس درس</a>
                          <a href="../admin/import.php" class="list-group-item">درج فایل اکسل نمرات</a>

                    <a href="../admin/delete_grades_by_ostad_name.php" class="list-group-item">حذف نمرات بر اساس استاد</a>
                        <a href="../admin/delete_all.php" class="list-group-item">حذف همه نمرات</a>
                         <a href="../admin/change_pwd.php" class="list-group-item active">تغییر پسورد مدیر سایت</a> 
                        
                            <a href="../admin/sign_out.php" class="list-group-item">خروج از سایت</a>
                </div>
            </div></div><div class="menul" >
  
            
         <?php       }   ?>   		
	
<div id="lcontainer"  align="center" style="width:94%; min-height:400px;  float:none;" >

 
  
	
			<?php		
			
			
		if(isset($_SESSION['admin']) && $_SESSION['admin'] == true){		
					

	
	
	
	


$id=$_SESSION['admin'] ;
include("../db.php");

if($_SERVER['REQUEST_METHOD'] != 'POST')
{

    echo '
	<h3 class="form-signin-heading">ابتدا پسورد قدیمی را وارد،و سپس پسورد جدید را دو بار وارد کنید</h3>
			  <hr class="colorgraph"><br>
	
	<div style="width:320px"  align="right"  >
	<form method="post" action="">
 	 	پسورد فعلی<input type="password" name="old_pass" class="form-control"/>
 		پسورد جدید<input type="password" name="new_pass" class="form-control">
		تکرار پسورد جدید <input type="password" name="new_pass_check"  class="form-control"></div><div style="width:320px"  align="left"  >
		<input type="submit" value="تغییر پسورد" class="btn btn-success" />
 	</div> </form></div> </div> ';
}
else
{

	$errors = array();
	
	if(!isset($_POST['old_pass']))
	{
		$errors[] = 'پسورد فعلی نمیتواند خالی باشد';

	}
	
	
	if(isset($_POST['new_pass']))
	{
		if($_POST['new_pass'] != $_POST['new_pass_check'])
		{
			$errors[] = 'پسورد جدید و تکرار آن ، یکسان وارد نشده اند';
		}
	}
	else
	{
		$errors[] = 'پسورد نمیتواند خالی باشد';
	}
	
	if (!$_POST['new_pass'])  {  $errors[] = 'پسورد نمیتواند خالی باشد';}
	
	if (!$_POST['old_pass'])  {  $errors[] = 'پسورد نمیتواند خالی باشد';}
	
	
$result = mysql_query("SELECT * FROM admin");
$record = mysql_fetch_array($result);
if (!$result) 
		{
		die("داده ای یافت نشد");
		}	
	
	if (sha1($_POST['old_pass'])<>$record['pass'])
	{ //echo  "";
	$errors[] = 'پسورد فعلی اشتباه وارد شده است';
	
	}
	
	
	
	
	
	
	
	
	
	
	if(!empty($errors))
	{
		echo '
					
					<div id="inner"  class="alert alert-danger" role="alert" style="width:420px;"  align="center"   >
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only">Error:</span> 
 
  ';
		echo '<ul dir="rtl">';
		foreach($errors as $key => $value) 
		{
			echo '<li>' . $value . '</li>'; 
		}
		echo '</ul>  </div> <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  <form action="../admin/change_pwd.php">
    <input type="submit" value="بازگشت به عقب" class="btn btn-primary" >
</form>';
		
	}
	else
	{

	$sql = "UPDATE admin SET pass ='".sha1($_POST['new_pass'])."'";
						
		$result = mysql_query($sql);
		if(!$result)
		{ //echo $sql ."<br>";


			echo '<div id="inner"  class="alert alert-danger" role="alert" style="width:490px;"  align="center"   >  خطایی حین انجام عملیات رخ داده است.لطفا بعداً دوباره تلاش کنید  </div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  <form action="../admin/change_pwd.php">
    <input type="submit" value="بازگشت به عقب" class="btn btn-primary" >
</form>';
			echo '<br>';
		//	die(mysql_error());
		}
		else
		{
			echo '<div id="inner"  class="alert alert-success" role="alert" style="width:450px;"  align="center"   >  پسورد با موفقیت عوض شد </div>
			<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
			  <form action="../admin/">
    <input type="submit" value="بازگشت به پنل مدیریت" class="btn btn-primary" >
</form>
			
			';
		}
	}
}



}  else { echo  '<div id="inner"  class="alert alert-danger" role="alert" style="width:450px;"  align="center"   > شما مجوز ورود به این بخش را ندارید </div>';     }

?>









































</body>
</html>