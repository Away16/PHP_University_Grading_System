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










<?php
session_start();
include('../db.php');

if(isset($_SESSION['student']) && $_SESSION['student'] == true)
{
	echo '
	
		<div class="wrapper">
      <div class="menur">
    
  
            <div class="col-md-2" >
                <p class="lead" style="font-family:Tahoma" align="center" >منوی مدیریت</p>
                <div class="list-group"  align="center"  dir="rtl">
                    <a href="../student/" class="list-group-item active">مشاهده همه نمرات</a>
                    <a href="../student/sign_out.php" class="list-group-item"> خروج از سایت</a>
                </div>
            </div></div>  <div class="menul" >
	

	
	
	
	
			<div id="lcontainer"  align="center" style="width:94%; min-height:400px;  float:none;" >
	<div id="inner"  class="alert alert-success" role="alert" style="width:420px;"  align="center"   >
  <span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>
  <span class="sr-only">
  </span><br>
	شما قبلا وارد سایت  شده اید </div></div>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	';
}
else
{
	if($_SERVER['REQUEST_METHOD'] != 'POST')
	{
		echo '
		
		<div class = "container">
	<div class="wrapper">
		<h3 class="form-signin-heading">خوش آمدید...لطفا شماره دانشجویی و رمزعبور خود را وارد کنید</h3>
			  <hr class="colorgraph"><br>
		
		
		
		
		
		
		
		<form method="post" action="" class="form-signin" dir="rtl">
			شماره دانشجویی: <input type="text" name="st_code" class="form-control" dir="ltr" /><br />
			رمزعبور:<input type="password" name="st_cmelli" class="form-control" dir="ltr" >
						
				کد امنیتی زیر را وارد نمائید: <input type="text" name="captcha" class="form-control" dir="ltr" ><br /><div style="text-align:center">
			<img src="../captcha.php" /> </div><br>
			<input type="submit" value="ورود به سامانه" class="btn btn-lg btn-primary btn-block" />
		 </form>';
	}
	else
	{
		$errors = array(); 
		
		if(!isset($_POST['st_code']))
		{
			$errors[] = 'شماره دانشجویی نباید خالی باشد';
		}
		
		if(!isset($_POST['st_cmelli']))
		{
			$errors[] = 'پسورد نمیتواند خالی باشد';
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
			<form action="../student/login.php">
    <input type="submit" value="بازگشت به عقب" class="btn btn-primary" >
</form></div>
			
			';
		}
		else
		{
			$sql = "SELECT 
						 id,st_name,st_code,course,grade,ostad_name,eteraz,st_note,ostad_note
					FROM
						grades
					WHERE
						st_code = '" . mysql_real_escape_string($_POST['st_code']) . "'
					AND
						st_cmelli = '" . $_POST['st_cmelli'] . "'";
						
			$result = mysql_query($sql);
			if(!$result)
			{
				//echo $sql.'<br>';
				echo '<div id="lcontainer"  align="center" style="width:94%; min-height:400px;  float:none;" ><div id="inner"  class="alert alert-danger" role="alert" style="width:420px;"  align="center"   > <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only">Error:</span> <br>
				اشکالی رخ داده لطفا بعدا تلاش کنید</div>';
			//	die( mysql_error() .'<br>');
				
			}
			else
			{
				if(mysql_num_rows($result) == 0)
				{
					echo '<div id="lcontainer"  align="center" style="width:94%; min-height:400px;  float:none;" >
					
					<div id="inner"  class="alert alert-danger" role="alert" style="width:420px;"  align="center"   >
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only">Error:</span><br>  هنوز هیچ نمره ای برای شما ثبت نشده است و یا شماره دانشجویی خود را اشتباه وارد کرده اید
  </div>
  
   
			<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
			<form action="../student/login.php">
    <input type="submit" value="بازگشت به عقب" class="btn btn-primary" >
</form>
  
  ';
				}
				else
				{
					$_SESSION['student'] = true;
					
					while($row = mysql_fetch_assoc($result))
					{
						$_SESSION['st_id'] 	= $row['id'];
						$_SESSION['st_name'] 	= $row['st_name'];
						$_SESSION['st_code']    = $row['st_code'];
					}
					
					echo '
					<div id="lcontainer"  align="center" style="width:94%; min-height:400px;  float:none;" dir="rtl">
							<div id="inner"  class="alert alert-success" role="alert" style="width:420px;"  align="center"   >
  <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
  <span class="sr-only">Error:</span><br><br>	
					
					
					خوش آمدید ' . $_SESSION['st_name']  .' <br /><a href="index.php">برای ادامه بروی لینک کلیک کنید</a>';
				}
			}
		}
	}
}
 ?>











































</body>

</html>