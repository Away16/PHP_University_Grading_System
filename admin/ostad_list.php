<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../style.css">
<script src="../jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ویرایش و حذف اساتید</title>
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
			
			if(isset($_SESSION['admin']) && $_SESSION['admin'] == true){	
			
			
			
	
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
            </div></div> <div class="menul" >
  
            
         <?php       }   ?>   		
	
<div id="lcontainer"  align="center" style="width:94%; min-height:400px;  float:none;" >


  
	
			<?php		
			
			
		if(isset($_SESSION['admin']) && $_SESSION['admin'] == true){		
					
			?>
  
  <?php
			
			
		
			
			include("../db.php");
			

		
		
		
				
			$result=mysql_query("SELECT * FROM ostad_login ORDER BY ostad_name");
			

$num_rows = mysql_num_rows($result);
			if ($num_rows>0){
				
				
				echo    '
	<h4 class="form-signin-heading">لیست اساتید</h4>
		<hr class="colorgraph">		
				<table border="1"  width="85%" dir="rtl" class="table table-striped">
  <thead class="thead-default">
				
				
				
				          <tr bgcolor="#eceeff">
    <th style="text-align:center;">نام استاد</th>
    <th style="text-align:center;">نام کاربری</th>
    <th style="text-align:center;">ویرایش</th>
     <th style="text-align:center;">حذف</th>
      
  </tr></thead>
				
				';


		
			while($test = mysql_fetch_array($result))
			
			{  
			    $id = $test['id'];
     			echo "<tr align='center'>";	
				echo"<td>" .$test['ostad_name']."</font></td>";
				echo"<td>" .$test['user']."</font></td>";
				echo"<td> <a href ='edit.php?id=$id'> ویرایش مشخصات</a>";
				echo"<td> <a href ='del.php?id=$id' " ?> onclick="return confirm('آیا مطمئن هستید که میخواهید استاد مربوطه را حذف کنید؟؟جهت یکپارچگی اطلاعات ، علاوه بر مشخصات استاد،تمامی نمرات دانشجویان که توسط این استاد آپلود شده نیز حذف خواهند شد')"  <?php echo "><center>حذف استاد</center></a>";
			
		
									
				echo "</tr>";
			} } else echo '<div  id="inner"  class="alert alert-success" role="alert" style="width:420px;"  align="center"  >
  <span class="glyphicon glyphicon-share" aria-hidden="true"></span>
  <span class="sr-only">Error:</span> <br><br> در حال حاضر هیچ استادی به سامانه اضاف نشده است.از طریق منوی مدیریت میتوانید برای ساخت نام کاربری اساتید اقدام کنید </div>';

			mysql_close($conn);
			
			
			
			
			}   else { echo '  <div id="inner"  class="alert alert-danger" role="alert" style="width:420px;"  align="center"   >
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only"></span><br>
  شما مجوز ورود به این بخش را ندارید
</div>   ';}
			
			?>
</table>

</div>

































































</body>
</html>