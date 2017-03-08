<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../style.css">
<script src="../jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>مشاهده همه نمرات</title>
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
			
			if(isset($_SESSION['student']) && $_SESSION['student'] == true){		
			
			
			
			
			
			
				?>
                <div class="menur">
    
  
            <div class="col-md-2" >
                <p class="lead" style="font-family:Tahoma" align="center" >منوی مدیریت</p>
                <div class="list-group"  align="center"  dir="rtl">
                    <a href="../student/" class="list-group-item active">مشاهده همه نمرات</a>
                    <a href="../student/sign_out.php" class="list-group-item"> خروج از سایت</a>
                </div>
            </div></div> <div class="menul" >
  
            
         <?php       }   ?>   		
	
<div id="lcontainer"  align="center" style="width:94%; min-height:400px;  float:none;" >



  
	
			<?php		
			
			
		if(isset($_SESSION['student']) && $_SESSION['student'] == true){		
					
			?>
     
            
            
  
  <?php
			
			
			
			
			
			
			
			
				
			
			
			
			
			
			
			
			
			
			
			
			
			
			include("../db.php");
			

		
		
		
				
			$result=mysql_query("SELECT * FROM grades where st_code=".$_SESSION['st_code']);
			
			
			
			
			
			
				$num_rows = mysql_num_rows($result);
			if ($num_rows>0){
				
				
				echo    '
					<h4 class="form-signin-heading">تمامی نمرات ثبت شده توسط اساتید</h4>
		<hr class="colorgraph">
				
				<table border="1"  width="85%" dir="rtl" class="table table-striped" >
  <thead class="thead-default">
				
				
				
				          <tr bgcolor="#eceeff"  bordercolor="#000000" >
 <th style="text-align:center; vertical-align:middle">نام دانشجو</th>
    <th style="text-align:center; vertical-align:middle">کد دانشجویی</th>
    <th style="text-align:center; vertical-align:middle">استاد</th>
     <th style="text-align:center; vertical-align:middle">نام درس</th>
      <th style="text-align:center; vertical-align:middle">نمره</th>
      <th style="text-align:center; vertical-align:middle">پیام استاد</th>
       <th style="text-align:center; vertical-align:middle" width="15%">ثبت اعتراض</th>
  </tr></thead>
				
				';
			
			
			
			
			
			
			
			
			

			
			while($test = mysql_fetch_array($result))
			{ if ($test['eteraz']=="1") echo "<tr align='center' style='background:pink;' class='highlight1' bordercolor='#000000' > "; 
			if ($test['eteraz']=="2") echo "<tr align='center' style='background:lightgreen;' class='highlight2'   bordercolor='#000000' >"; 
		  if ($test['eteraz']=="0") 	echo "<tr align='center'  bordercolor='#000000' >"; 
			
			
				echo"<td>" .$test['st_name']."</font></td>";
				echo"<td>" .$test['st_code']."</font></td>";
				echo"<td>". $test['ostad_name']. "</font></td>";
				echo"<td>". $test['course']. "</font></td>";
				echo"<td>". $test['grade']. "</font></td>";
				echo"<td width="."'30%'"."><font color='black'>". $test['ostad_note']. "</font></td>";

			
				if ($test['grade']<>"20"){
					
					if ($test['eteraz']=="0" || $test['eteraz']=="1" )
					echo "<td width="."'10%'"."> <a href=re-mark.php?id=".$test['id'].">ثبت اعتراض</a></td>";
					
					if ($test['eteraz']=="2")
					echo "<td width="."'10%'"."> <a href=re-mark.php?id=".$test['id'].">مشاهده نتیجه اعتراض</a></td>";	
					
					
	
	} else  echo "<td width="."'10%'".">     </td>";
		
									
				echo "</tr>";
			} } else {echo '<div  id="inner"  class="alert alert-success" role="alert" style="width:420px;"  align="center"  >
  <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
  <span class="sr-only">Error:</span> <br><br> هیچ نمره ای برای نمایش در سامانه درج نشده است </div>';}
			
			
			mysql_close($conn);
			
			
			
			
			}   else { echo '
					<div id="inner"  class="alert alert-danger" role="alert" style="width:420px;"  align="center"  >
  <span class="glyphicon glyphicon-exclamation-sign"   aria-hidden="true"></span>
  <span class="sr-only">Error:</span><br> شما مجوز دسترسی به این بخش را ندارید';}
			
			?>
</table>





























































































</body>

</html>