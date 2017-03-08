<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../style.css">
<script src="../jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>درخواست اعتراض</title>
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
if(isset($_SESSION['student']) && $_SESSION['student'] == true)
{

?>
                <div class="menur">
    
  
            <div class="col-md-2" >
                <p class="lead" style="font-family:Tahoma" align="center" >منوی مدیریت</p>
                <div class="list-group"  align="center"  dir="rtl">
                    <a href="../student" class="list-group-item active">مشاهده همه نمرات</a>
                    <a href="../student/sign_out.php" class="list-group-item"> خروج از سایت</a>
                </div>
            </div></div>  <div class="menul" >
  
            
         <?php       }   ?>   		
	
<div id="lcontainer"  align="center" style="width:94%; min-height:400px;  float:none;" >

<table   width="85%" dir="rtl" class="table table-striped">
 
  
	
			<?php		
			
			
	if(isset($_SESSION['student']) && $_SESSION['student'] == true){		
					
		
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
				$ostad_note=$record['ostad_note'];
				$eteraz_state=$record['eteraz'];
				//$eteraz=$record['eteraz'] ;

if(isset($_POST['save']))
{	
	$st_note_save = $_POST['student_note'];
	//$grade_save = $_POST['grade'];
	
	//mysql_query("UPDATE grades SET ostad_note ='$ostad_note_save', grade ='$grade_save' WHERE id = '$id'")

	mysql_query("UPDATE grades SET st_note ='$st_note_save',eteraz=1  WHERE id = '$id'");
	if (mysql_error()){
				
					echo '    <div id="inner"  class="alert alert-danger" role="alert" style="width:420px;"  align="center"   >
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only">Error:</span>
  خطایی در انجام عملیات درخ داده است
</div>  
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<form action="../student/">
    <input type="submit" value="بازگشت به عقب" class="btn btn-primary" >
</form>

 ';	 die(''); } else {
	echo "پیام با موفقیت ثبت شد";
	
	header("Location:index.php");			
}}
mysql_close($conn);




?>





<form method="post" dir="rtl">
<table dir="rtl">
	<tr>
		<td style='font-weight:bold'>متن اعتراض دانشجو:</td>
		<td>
        <textarea name="student_note" cols="100" rows="9" dir="rtl" class="form-control" <?php  
		if ($eteraz_state=='2') { echo 'DISABLED';}
		
		
		?>   > <?php echo $st_note ?>  </textarea>
</td>
	</tr>
    <td>&nbsp;</td>
	<tr>
		<td style='font-weight:bold'>پیام استاد:</td>
		<td>
        <textarea name="ostad_note" cols="100" rows="9" dir="rtl" class="form-control"  disabled > <?php echo $ostad_note ?>   </textarea>
        
    </td>
	</tr>
		
	<tr>
		<td>&nbsp; <br /><br /><br /></td>
		<td dir="ltr">
        
        <?php if ($eteraz_state=='2')  echo '</form><form action="../student/">
    <input type="submit" value="اعتراض ممکن نیست ، بازگشت به عقب" class="btn btn-primary" />
';
		
		if ($eteraz_state=='1' || $eteraz_state=='0')  echo '<input type="submit" name="save" value="ثبت و ذخیره اعتراض" class="btn btn-success"/></td>';
		
		
		 ?>
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