<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../bootstrap/css/docs.min.css">
<link rel="stylesheet" href="../style.css">
<script src="../jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<style>
@font-face {
  font-family: 'vazir';
  src: url('../bootstrap/fonts/Vazir.eot') format('eot'),  
       url('../bootstrap/fonts/Vazir.woff') format('woff'),
       url('../bootstrap/fonts/Vazir.ttf') format('truetype');  
  font-style:normal;
  font-weight:normal;
}

</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>صفحه اصلی سایت</title>
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

<div id="lcontainer"  align="center" style="width:94%; min-height:400px;  float:none;" >

	<h3 class="form-signin-heading" >خوش آمدید...لطفا وارد بخش مورد نظر شوید</h3>
			  <hr class="colorgraph"><br>
<br />
<div    style="font-family:vazir; font-size:28px">

   
   <table style="vertical-align:text-bottom" >
   
   <tr >
   <td ><div class="bs-glyphicons" > <ul class="bs-glyphicons-list" > <a href="https://edu.uast.ac.ir/"><li style="width:202px; height:130px"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> <span class="glyphicon-class" style="width:180px; height:80px"><font size="+1">ورود به سامانه سجاد</font></span> </li> </a></ul></div> </td>
   <td><div class="bs-glyphicons"> <ul class="bs-glyphicons-list" > <a href="../admin/login.php"><li style="width:202px; height:130px"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <span class="glyphicon-class" style="width:180px; height:80px" ><font size="+1">ورود به بخش مدیریت سایت</font></span> </li> </a></ul></div>  </td>
 
   <td > <div class="bs-glyphicons"> <ul class="bs-glyphicons-list" > <a href="../panel/login.php"><li style="width:202px; height:130px"><span class="glyphicon glyphicon-list" aria-hidden="true"></span> <span class="glyphicon-class" style="width:180px; height:80px"><font size="+1">ورود اساتید به سایت</font></span> </li> </a></ul></div></td>
   <td> <div class="bs-glyphicons"> <ul class="bs-glyphicons-list" > <a href="../student/login.php"><li style="width:202px; height:130px"><span class="glyphicon  glyphicon-education" aria-hidden="true"></span> <span class="glyphicon-class" style="width:180px; height:80px"><font size="+1">ورود دانشجویان جهت مشاهده نمره</font></span> </li> </a></ul></div></td>
   </tr>
   
   </table>
   
   
   
  <div > 
   

 
 </div>
</div>
</div>

</body>
<?php  include_once('footer.php');               ?>
</html>