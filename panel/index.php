<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
<script src="../jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="../style.css">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>مشاهده نمرات دانشجویان</title>
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
			
			if(isset($_SESSION['ostad']) && $_SESSION['ostad'] == true){	
			
		
				?>
                <div class="menur">
    
  
            <div class="col-md-2" dir="rtl"  align="center">
                <p class="lead" style="font-family:Tahoma" align="center" >منوی مدیریت</p>
                <div class="list-group"  >
                    <a href="../panel/" class="list-group-item active">مشاهده همه نمره ها</a>
                    <a href="../panel/re-mark_requests.php" class="list-group-item">اعتراضات بررسی نشده</a>
                    <a href="../panel/import.php" class="list-group-item">درج فایل اکسل نمرات</a>
                     <a href="../panel/delete_course_by_name.php" class="list-group-item ">حذف نمره بر اساس درس</a>
                                     <a href="../panel/delete_all.php" class="list-group-item">حذف همه نمرات دانشجویان</a>
              <a href="../panel/change-pwd.php" class="list-group-item">تغییر پسورد سایت</a>       <a href="../panel/sign_out.php" class="list-group-item">خروج از سایت</a>                              
                                     
                                     
                </div>
            </div></div> <div class="menul" >
  
            
         <?php       }   ?>   		
	
<div id="lcontainer"  align="center" style="width:94%; min-height:400px;  float:none;" >


  
	
			<?php		
			
			
		if(isset($_SESSION['ostad']) && $_SESSION['ostad'] == true){		
					
			?>
  
  <?php
			
			
			
			
			
			
			
			
				
			
			
			include("../db.php");
			

		
		
		
				
			$result=mysql_query("SELECT * FROM grades where ostad_user_id=".$_SESSION['ostad_id']." ORDER BY course, st_name");
			
	//$result=mysql_query("SELECT * FROM `grades` WHERE eteraz=1");
	//  بعدا فرمی مجزا با این دستور بالایی		
			$num_rows = mysql_num_rows($result);
			if ($num_rows>0){
				
				
				echo    '
				<h4 class="form-signin-heading">تمامی نمرات دانشجویان شما</h4>
		<hr class="colorgraph">	
				<table border="1"  width="85%" dir="rtl" class="table table-striped">
  <thead class="thead-default">
				
				
				
				          <tr bgcolor="#eceeff">
    <th style="text-align:center;">نام دانشجو</th>
    <th style="text-align:center;">کد دانشجویی</th>
    <th style="text-align:center;">استاد</th>
     <th style="text-align:center;">نام درس</th>
      <th style="text-align:center;">نمره</th>
      <th style="text-align:center;" width="14%">اعتراض</th>
  </tr></thead>
				
				';
			
			while($test = mysql_fetch_array($result))
			{   if ($test['eteraz']=="1") echo "<tr align='center' style='background:pink;' class='highlight1' >             "; 
			if ($test['eteraz']=="2") echo "<tr align='center' style='background:lightgreen;' class='highlight2'>"; 
		  if ($test['eteraz']=="0") 	echo "<tr align='center'>"; 
			
     				
				echo"<td>" .$test['st_name']."</td>";
				echo"<td>" .$test['st_code']."</td>";
				echo"<td>". $test['ostad_name']. "</td>";
				echo"<td>". $test['course']. "</td>";
				echo"<td>". $test['grade']. "</td>";
			
				if ($test['eteraz']=="1"){echo "<td width="."'10%'"."> <a href=edit.php?id=".$test['id'].">عملیات</a></td>";
	
	} 
	
	 if ($test['eteraz']=="0")  echo "<td width="."'10%'".">    خیر </td>";
	 
	if ($test['eteraz']=="2") echo "<td width="."'10%'"."> <a href=edit.php?id=".$test['id'].">بررسی شده</a></td>"; 	
									
				echo "</tr>";
			} } else echo '<div  id="inner"  class="alert alert-success" role="alert" style="width:420px;"  align="center"  >
  <span class="glyphicon glyphicon-share" aria-hidden="true"></span>
  <span class="sr-only">Error:</span> <br><br> هیچ نمره ای برای نمایش در سامانه درج نشده است.در صورت نیاز فایل اکسل خود را برای درج نمرات وارد سامانه کنید </div>';
			mysql_close($conn);
			
			
			
			
			}   else { echo '    <div id="inner"  class="alert alert-danger" role="alert" style="width:420px;"  align="center"   >
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only"></span><br>
  شما مجوز ورود به این بخش را ندارید
</div>   ';}
			
			
			?>
</table>

</div>


  
  </div></div>




</div>




























































































</body>
</html>