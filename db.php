<?php  

error_reporting(E_ALL ^ E_DEPRECATED);
	$conn = mysql_connect('localhost', 'manochehr_db1', 'p1id1axg');
	 if (!$conn)
    {
	 die(' <div id="inner"  class="alert alert-danger" role="alert" style="width:420px;"  align="center"   >
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only"></span><br>
 خطایی هنگام ارتباط با بانک اطلاعاتی رخ داده است
</div> ');
	}
	mysql_select_db("manochehr_db1", $conn);
?>

