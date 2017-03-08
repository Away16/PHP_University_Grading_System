<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../style.css">
<script src="../jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>حذف نمرات بر اساس استاد</title>
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
                    <a href="../admin/ostad_list.php" class="list-group-item">ویرایش و حذف لیست اساتید</a>
                    <a href="../admin/create.php" class="list-group-item">ایجاد نام کاربری برای استاد</a>
                    <a href="../admin/view_course_by_ostad.php" class="list-group-item">مشاهده نمرات بر اساس استاد</a>

                    <a href="../admin/view_course_by_name.php" class="list-group-item">مشاهده نمرات بر اساس درس</a>
 <a href="../admin/import.php" class="list-group-item">درج فایل اکسل نمرات</a>

                    <a href="../admin/delete_grades_by_ostad_name.php" class="list-group-item active">حذف نمرات بر اساس استاد</a>
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
					









include '../db.php';

    if($_SERVER['REQUEST_METHOD'] != 'POST')
    {   
       
        $sql = "SELECT
                   id,ostad_name
                FROM
                    ostad_login  ORDER BY ostad_name";
         
        $result = mysql_query($sql);
         
        if(!$result)
        {
          
            echo '  <div id="inner"  class="alert alert-danger" role="alert" style="width:420px;"  align="center"   >
  <span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span>
  <span class="sr-only"></span><br><br>
خطایی  هنگام فراخوانی اطلاعات از بانک اطلاعاتی رخ داده است</div>  
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<form action="../admin/">
    <input type="submit" value="بازگشت به عقب" class="btn btn-primary" >
</form>
';
        }
        else
        {
            if(mysql_num_rows($result) == 0)
            {

                    echo '<div id="inner"  class="alert alert-info" role="alert" style="width:420px;"  align="center"   >
  <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
  <span class="sr-only"></span><br>
هنوز هیچ استادی در سیستم تعریف نشده است</div>  
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<form action="../admin/">
    <input type="submit" value="بازگشت به عقب" class="btn btn-primary" >
</form>

 ';
                }
           
            else
            {
         
                echo '<h4 class="form-signin-heading">حذف نمرات بر اساس استاد</h4>
		<hr class="colorgraph">	
				
				
				<form method="post" action="">
                      <div>  <b>    نام استاد  </b></div>'; 
                 
                echo '<div style="width:220px"><select name="ostad_name" class="form-control" dir=rtl>';
                    while($row = mysql_fetch_assoc($result))
                    {
    echo '<option value="' . $row['id'] . '">' . $row['ostad_name'] . '</option>';
                    }
                 //	echo $row['id'];
                echo '</select></div><br>'; 
             ?>
             
       <input name="_delete_" type="submit" class="btn btn-warning  button-loading" value="حذف نمرات استاد انتخاب شده" onclick="return confirm('آیا مطمئن هستید میخواهید نمرات را حذف کنید؟تمامی نمرات استاد مورد نظر حذف خواهند شد و این عمل غیر قابل بازگشت خواهد بود')">  </form>
       
       <?php       
			  
			  
			  
			         
               // echo '<input name="_delete_" type="submit" class="btn btn-success  button-loading" value="حذف نمرات استاد انتخاب شده" onclick="return confirm("Are you sure?")">  </form>';
            }
        }
    }
    else
    {
       
				
$result2=mysql_query("delete from grades where ostad_user_id=".$_POST['ostad_name']."  ORDER BY course, st_name");
//echo $_POST['ostad_name'];
 if (!$result2){
	 
	 echo '<div class="alert alert-danger" role="alert" style="width:420px;"  align="center"   >
  <span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span>
  <span class="sr-only"></span><br><br>
خطایی  در حذف اطلاعات رخ داده است رخ داده است</div>  
<form action="../admin/">
    <input type="submit" value="بازگشت به عقب" class="btn btn-primary" >
</form>';
	 
	 } else { echo '<div  id="inner" class="alert alert-success" role="alert" style="width:420px;"  align="center"  >
  <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
  <span class="sr-only">Error:</span> <br><br>تمامی نمرات دانشجویان استاد مورد نظر ، حذف شدند </div>
  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  <form action="../admin/">
  
    <input type="submit" value="بازگشت به عقب" class="btn btn-primary" >
</form>
  '; }
	   
    }
}   else { echo '   <div id="inner"  class="alert alert-danger" role="alert" style="width:420px;"  align="center"   >
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only"></span><br>
  شما مجوز ورود به این بخش را ندارید
</div>   ';}
 
?>
































































</body>
</html>