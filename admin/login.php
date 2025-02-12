<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../style.css">
<script src="../jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ورود به سایت</title>
</head>
<body >

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





<?php
session_start();
include('../db.php');

if(isset($_SESSION['admin']) && $_SESSION['admin'] == true)
{
	echo '
	
		<div class="wrapper">
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
	

	
	
	
	
			<div id="lcontainer"  align="center" style="width:94%; min-height:400px;  float:none;" >
	<div id="inner"  class="alert alert-success" role="alert" style="width:420px;"  align="center"   >
  <span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>
  <span class="sr-only">
  </span><br>
	شما قبلا وارد سایت  شده اید </div></div>';
	
	
}
else
{
	if($_SERVER['REQUEST_METHOD'] != 'POST')
	{
		echo '
		
		<div class = "container">
	<div class="wrapper">
		    <h3 class="form-signin-heading">خوش آمدید...لطفا نام کاربری و رمزعبور خود را وارد کنید</h3>
			  <hr class="colorgraph"><br>
		
				<form action="" method="post" name="Login_Form" class="form-signin" dir="rtl">       

	
		
			نام کاربری: <input type="text" name="user_name" class="form-control" dir="ltr"/><br />
			رمزعبور: <input type="password" name="user_pass" class="form-control" dir="ltr">			
				کد امنیتی زیر را وارد نمائید: <input type="text" name="captcha" class="form-control" dir="ltr" ><br /><div style="text-align:center">
			<img src="../captcha.php" /> </div><br>
			<input type="submit" value="ورود به بخش مدیریت" class="btn btn-lg btn-primary btn-block" />
			
		 </form>';
	}
	else
	{
		$errors = array(); 
		
		if(!isset($_POST['user_name']))
		{
			$errors[] = 'لطفا نام کاربری را وارد کنید';
		}
		
		if(!isset($_POST['user_pass']))
		{
			$errors[] = 'لطفا پسورد را وارد کنید';
		}
		
		if(!isset($_POST['captcha']))
		{
			$errors[] = 'کد امنیتی نمیتواند خالی باشد';
		}
		
		if(($_SESSION["code"]<>$_POST["captcha"]))
{
	//echo $_POST['captcha'].'<br>';
	//echo $_SESSION["code"];
$errors[] = 'کد امنیتی اشتباه وارد شده است';
}
		
		
		
		
		
		if(!empty($errors)) 
		{
			echo '<div id="lcontainer"  align="center" style="width:94%; min-height:400px;  float:none;" >
					
					<div id="inner"  class="alert alert-danger" role="alert" style="width:420px;"  align="center"   >
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only">Error:</span> <br>';
			echo '<ul dir="rtl">';
			foreach($errors as $key => $value)
			{
				echo '<li>' . $value . '</li>'; 
			}
			echo '</ul>
			  </div>
			<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
			<form action="../admin/login.php">
    <input type="submit" value="بازگشت به عقب" class="btn btn-primary" >
</form></div>
			
			
			';
		}
		else
		{
			$sql = "SELECT 
						user,pass
					FROM
						admin
					WHERE
						user = '" . mysql_real_escape_string($_POST['user_name']) . "'
					AND
						pass = '" . sha1($_POST['user_pass']) . "'";
						
			$result = mysql_query($sql);
			if(!$result)
			{
				//echo $sql.'<br>';
				echo '<div id="lcontainer"  align="center" style="width:94%; min-height:400px;  float:none;" ><div id="inner"  class="alert alert-danger" role="alert" style="width:420px;"  align="center"   > <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only">Error:</span> <br>
				اشکالی رخ داده لطفا بعدا تلاش کنید</div>';
			//	die('<br>'. mysql_error() .'<br>');
				
			}
			else
			{
				if(mysql_num_rows($result) == 0)
				{
					echo '<div id="lcontainer"  align="center" style="width:94%; min-height:400px;  float:none;" >
					
					<div id="inner"  class="alert alert-danger" role="alert" style="width:420px;"  align="center"   >
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only">Error:</span><br> نام کاربری و رمزعبور را اشتباه وارد کرده اید 

</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<form action="../admin/login.php">
    <input type="submit" value="بازگشت به عقب" class="btn btn-primary" >
</form>
'
 ;
				}
				else
				{
					$_SESSION['admin'] = true;
					
					while($row = mysql_fetch_assoc($result))
					{
						$_SESSION['admin_user'] 	= $row['user'];
					}
					
					echo '
						<div id="lcontainer"  align="center" style="width:94%; min-height:400px;  float:none;" dir="rtl">
							<div id="inner"  class="alert alert-success" role="alert" style="width:420px;"  align="center"   >
  <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
  <span class="sr-only">Error:</span><br><br>
					
					
					خوش آمدید, ' . $_SESSION['admin_user'] . ' <br /><a href="index.php">برای ادامه بروی لینک کلیک کنید</a>';
				}
			}
		}
	}
}
 ?>











































</body>
</html>