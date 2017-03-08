<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../style.css">
<script src="../jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>آپلود فایل نمرات</title>
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
	
	
	if(isset($_SESSION['admin']) && $_SESSION['admin'] == true){  ?>
    
    
    
    
    
    
    	
				
                  <div class="menur">
    
  
            <div class="col-md-2" dir="rtl"  align="center">
                <p class="lead" style="font-family:Tahoma" align="center" >منوی مدیریت</p>
                    <div class="list-group"  >
                	<a href="../admin/" class="list-group-item" >پنل مدیریت</a>
                    <a href="../admin/ostad_list.php" class="list-group-item">ویرایش و حذف لیست اساتید</a>
                    <a href="../admin/create.php" class="list-group-item">ایجاد نام کاربری برای استاد</a>
                    <a href="../admin/view_course_by_ostad.php" class="list-group-item">مشاهده نمرات بر اساس استاد</a>

                    <a href="../admin/view_course_by_name.php" class="list-group-item">مشاهده نمرات بر اساس درس</a>
      <a href="../admin/import.php" class="list-group-item active">درج فایل اکسل نمرات</a>
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
   	
				
   
require '../Classes/PHPExcel.php';
require_once '../Classes/PHPExcel/IOFactory.php';
require("../db.php");


    if(!isset($_POST["Import"]))
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

                    echo '    <div id="inner"  class="alert alert-info" role="alert" style="width:420px;"  align="center"   >
  <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
  <span class="sr-only"></span><br>
 هنوز هیچ استادی در سیستم تعریف نشده است.جهت تعریف استاد از طریق منوی مدیریت اقدام نمائید
</div>  
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<form action="../admin/">
    <input type="submit" value="بازگشت به عقب" class="btn btn-primary" >
</form>

 ';
                }
           
            else
            {
         
          
          

		  
		  	echo '	  <hr class="colorgraph"  ><br>
		<form class="form-horizontal well" action="" method="post"  name="import_excel" enctype="multipart/form-data"  dir="rtl">
                <h4>انتخاب فایل نمرات جهت درج در سامانه</h4>
                    <div class="input-group" >
                        <span class="input-group-btn" >
                            <span class="btn btn-primary btn-file" style="width:400px;" style="text-align:center">
                             
                     انتخاب فایل با فرمت XLS یا XLSX   <br />
                     
               <br />     
                     <input type="file" name="file" id="file" multiple dir="ltr"  align="middle" style="text-align:center; width:360px " >
                            </span>
                        </span>
                     
                    </div>
                    <span class="help-block"  >
                       لطفا به فرمت فایل اکسل توجه کنید.اگر فرمت فایل ، متناسب با فرمت مشخص شده نباشد ، مشخصات بدرسی در بانک اطلاعاتی درج نمیشوند.
                    </span>
		

                   
  

		
		';	
		
		      echo '
			
              <div>لطفا توجه کنید که نمرات آپلود شده بنام استادی که در پایین انتخاب میکنید ، ثبت خواهد شد <br><br>  <b>    نام استاد  </b></div>  '; 
                 
                echo '<div style="width:220px"><select name="ostad_name0"  class="form-control" dir=rtl>';
                    while($row = mysql_fetch_assoc($result))
                    {
    echo '<option value="' . $row['id']  . '|'.  $row['ostad_name'] .  '">' . $row['ostad_name'] . '</option>';

 
                    }
                 //	echo $row['id'];
                echo '</select></div><br>'; 
                     
                echo '<input type="submit" id="submit" name="Import" value="درج نمرات استاد انتخابی" class="btn btn-success  button-loading" />
                 </form>';
			
		  
		  
		  
		  }
			
			
	
			
			
			
			
			
			
			
			
			
			
			
			
			
        }
    }
    else
    {
       
	   




	$query  = "BEGIN WORK;";
		$result = mysql_query($query);


if(( $_FILES["file"]["type"]=='application/vnd.ms-excel'   ||     $_FILES["file"]["type"]=='application/vnd.openxmlformats-officedocument.spreadsheetml.sheet')  &&  ( $_FILES["file"]["size"]<'1000000'  )  ){
 $path=$_FILES["file"]["tmp_name"];

$objPHPExcel = PHPExcel_IOFactory::load($path);

foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
    $worksheetTitle     = $worksheet->getTitle();
    $highestRow         = $worksheet->getHighestRow(); //مثلا 20 اگر جواب نداد
   $highestColumn      = 'E'; 
	//$worksheet->getHighestColumn('');   شناسایی خودکار 
    $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
    $nrColumns = ord($highestColumn) - 64;




if ($highestRow<=280 ) {


echo '

<div  class="alert alert-danger" role="alert" dir="rtl">لطفا محتویات جدول را بررسی کنید و اگر اشکالی در اطلاعات وجود دارد فایل اکسل خود را تصحیح، و اطلاعات وارد شده در بانک اطلاعاتی را از منوی مدیریت استاد، حذف و دوباره فایل اکسل تصحیح شده را وارد نمائید.اگر خطایی در پائین صفحه نمایش داده شده،ابتدا نمرات را از قسمت حذف نمرات پاک کنید و سپس دوباره اقدام به تصحیح و آپلود فایل کنید</div>


<div class="alert alert-info" role="alert">
این اطلاعات از فایل اکسل وارد دیتابیس خواهد شد.لطفا در پائین صفحه نتیجه درج اطلاعات در بانک اطلاعات را بررسی کنید

</div>
';
//echo "<br>The worksheet ".$worksheetTitle." has ";
//echo $nrColumns . ' columns (A-' . $highestColumn . ') ';
//echo ' and ' . $highestRow . ' row.';
echo '<br> <table border="1" width="75%" dir="rtl" class="table table-striped">
<thead class="thead-default">
 <tr bgcolor="#eceeff">
    <th style="text-align:center;">نام دانشجو</th>
    <th style="text-align:center;">کد دانشجویی</th>
    <th style="text-align:center;">کد ملی</th>
     <th style="text-align:center;">نام درس</th>
      <th style="text-align:center;">نمره</th>
    
  </tr></thead>





<tr align="center"> ';

for ($row = 2; $row <= $highestRow; ++ $row) {
    echo '<tr dir="rtl" align="center">';
    for ($col = 0; $col < $highestColumnIndex; ++ $col) {
        $cell = $worksheet->getCellByColumnAndRow($col, $row);
        $val = $cell->getCalculatedValue();
     
        echo '<td dir="rtl">' . $val . '<br></td>';
    }
    echo '</tr >';
}
echo '</table>'; }
}
if ($highestRow<=280 ) {
for ($row = 2; $row <= $highestRow; ++ $row) {
$val=array();
for ($col = 0; $col < $highestColumnIndex; ++ $col) {
$cell = $worksheet->getCellByColumnAndRow($col, $row);
$val[] = $cell->getCalculatedValue();
}


	$test = explode('|', $_POST['ostad_name0']);
//	echo $test[0].'<br>'; 	echo $test[1].'<br>';

		
$sql="INSERT INTO grades(id, st_name, st_code, st_cmelli, course, grade, ostad_user_id, ostad_name, eteraz, st_note, ostad_note) 
VALUES (NULL,'".$val[0] . "'," . ($val[1]?"'".$val[1]."'":"NULL") . "," . ($val[2]?"'".$val[2]."'":"NULL"). ",'" . $val[3]. "','" . $val[4]. "','" .$test[0]."','".$test[1]."','0','','')";
//echo $sql."\n";
  if (!mysql_query($sql)){   $sql = "ROLLBACK;";
				$result = mysql_query($sql);      die('



<div class="alert alert-danger" role="alert" dir="rtl">
<span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span>
<br>
اشکالی در عملیات درج اطلاعات در بانک اطلاعاتی رخ داده است.لطفا بررسی کنید آیا فرمت فایل اکسل مطابق فرمت پیشنهادی باشد و محل ستون ها در فایل اکسل جابجا نباشد.همچنین مطمئن شوید که تمامی نمرات دانشجویان در فایل اکسل وارد شده باشد و نمره دانشجویی خالی نباشد.

</div>
' );        }
  //$sql = "ROLLBACK;";
			//	$result = mysql_query($sql); 	 			
				  //   die(mysql_error($sql) );   } //. mysql_error() 

}

if (mysql_query($sql)){
	$sql = "COMMIT;";
					$result = mysql_query($sql);
	echo '<div class="alert alert-success" role="alert">اطلاعات جدول فوق با موفقیت وارد بانک اطلاعاتی شدند</div>';	
	
	}



	}   else echo '<div  id="inner"   class="alert alert-danger" role="alert" dir="rtl">تعداد رکوردهای فایل اکسل ، بیشتر از 280 رکورد است.حداکثر ردیف فایل اکسل کمتر از 280 ردیف باید باشد</div>
';                }             else {  
	
	if((($_POST["Import"])) &&    ( $_FILES["file"]["type"]!=='application/vnd.ms-excel'   ||     $_FILES["file"]["type"]!=='application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'          )              )
	{ echo '
<div  id="inner" >	<br><br><br><br><br><div class="alert alert-danger" role="alert" dir="rtl" >
	
	
	فرمت فایل انتخاب شده برای آپلود باید اکسل باشد.حجم فایل اکسل هم باید کمتر از یک مگابایت باشد</div>
	

	
	<br><br><br><br>
<form action="../admin/import.php">
    <input type="submit" value="بازگشت به عقب" class="btn btn-primary" >
</form>
	
	
';}
	}
	
	}	   
	   

	   
 
	   
    }
 else echo ' <div id="inner"  class="alert alert-danger" role="alert" style="width:420px;"  align="center"   >
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only"></span><br>
  شما مجوز ورود به این بخش را ندارید
</div> ';


































































































?>             
                












</body>
</html>