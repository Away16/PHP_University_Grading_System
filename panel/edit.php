<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../style.css">
<script src="../jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>پاسخ به اعتراض دانشجو</title>
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
if(isset($_SESSION['ostad']) && $_SESSION['ostad'] == true)
{

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
            </div></div><div class="menul" >
  
            
         <?php       }   ?>   		
	
<div id="lcontainer"  align="center" style="width:94%; min-height:400px;  float:none;" >

<table   width="85%" dir="rtl" class="table table-striped">
 
  
	
			<?php		
			
			
		if(isset($_SESSION['ostad']) && $_SESSION['ostad'] == true){		
					
			

require("../db.php");
$id =$_REQUEST['id'];
$result = mysql_query("SELECT * FROM grades WHERE id  = '$id'");
$record = mysql_fetch_array($result);
if (!$result) 
		{
		die('<div id="inner"  class="alert alert-danger" role="alert" style="width:420px;"  align="center"   >
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only">Error:</span>
  خطایی در انجام عملیات درخ داده است
</div> ');
		}
	            $st_note=$record['st_note'] ;
				$ostad_note= $record['ostad_note'] ;					
				$grade=$record['grade'] ;

if(isset($_POST['save']))
{	
	$ostad_note_save = $_POST['ostad_note'];
	$grade_save = $_POST['grade'];
	

	mysql_query("UPDATE grades SET ostad_note ='$ostad_note_save', grade ='$grade_save' , eteraz ='2'  WHERE id = '$id' ");
				
				if (mysql_error()){
					
				echo '    <div id="inner"  class="alert alert-danger" role="alert" style="width:420px;"  align="center"   >
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only">Error:</span>
  خطایی در انجام عملیات درخ داده است
</div>  
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<form action="../panel/">
    <input type="submit" value="بازگشت به عقب" class="btn btn-primary" >
</form>

 ';	   die('');
					 
					 
					  } else{
	echo "پیام با موفقیت ثبت شد";
	
	header("Location:index.php");}			
}
mysql_close($conn);




?>




<form method="post">
<table dir="rtl">
	<tr>
		<td><b>متن اعتراض دانشجو:</b></td>
		<td>
        
                <textarea name="title" cols="108" rows="9" dir="rtl" class="form-control"  DISABLED> <?php echo $st_note ?>  </textarea>

        
</td>
	</tr>
	<tr>
		<td><b>جوابیه استاد:</b></td>
        
        
		<td>
        
        
        
         <textarea name="ostad_note" cols="108" rows="9" dir="rtl" class="form-control"  > <?php echo $ostad_note ?>  </textarea>
        </td>
	</tr>
	<tr>
		<td><b>نمره جدید:</b></td>
		<td ><input type="text" name="grade" value="<?php echo $grade ?>" class="form-control" /></td>
	</tr>
	
	<tr >
    
		<td>&nbsp;  <br /><br /><br /></td> 
		<td dir="ltr" ><input type="submit" name="save" value="ذخیره تغییرات اعتراض" class="btn btn-success" /></td>
	</tr>
</table>




<?php   }
else { echo  '    <div id="inner"  class="alert alert-danger" role="alert" style="width:420px;"  align="center"   >
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only"></span><br>
  شما مجوز ورود به این بخش را ندارید
</div>   ';}  ?>




</div>


  
  </div></div>




</div>






</body>
</html>