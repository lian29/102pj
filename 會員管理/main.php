<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>資訊管理系 - 學生專區</title>
<link href="css/main_layout.css" rel="stylesheet" type="text/css" />
<script src="jquery-1.7.1.js"></script>
<script language="JavaScript">
$(document).ready(function(){
   $('.tab:first').show()  
   $('#tabs li a:first').addClass('active');
   $('ul#tabs li a').click(function() {
      var index = $('ul#tabs li a').index(this);
      $('ul#tabs li a').removeClass('active');
      $(".tab:visible").hide();
      $(".tab:eq(" + index + ")").show();
      $(this).addClass('active');
      return false;
   });
});
</script>
</head>

<body>
<?php
	require_once("dbtools.inc.php");
      session_start();
	  if (isset($_SESSION["student_id"]))
	  {
        $student_id = $_SESSION["student_id"];
	  }
	else
	{
	    header("location:index.html");
	}
      $link = create_connection();		//建立資料庫連結	  
      $sql = "SELECT * FROM `im` WHERE student_id = '$student_id'";
      $result = execute_sql("License", $sql, $link);
	  $row = mysql_fetch_assoc($result);
?>
<div id="wrapper">
<div id="header"><img src="images/tpcu.png">
<div id="header2"><a href="http://www.tpcu.edu.tw/bin/home.php">臺北城市科技大學</a> | 聯絡我們</div>
<p align="center"><img src="images/im.png"></p>

</div>
<div id="sidebar1">	
	<img src="images/登入身份.png">
	<div class="login">
    <p>帳號：<?php echo $row['student_id'] ?></p>
    <p>姓名：<?php echo $row['name'] ?></p>
    <p>學制：<?php echo $row['class'] ?></p>    
    <p><a href="logout.php">登出網站</a></p>
	</div>
</div>
<div id="content">
<div id="container">
   <ul id="tabs" class="fix">
      <li><a href="#">累計證照</a></li>
      <li><a href="#">點數累計</a></li>
      <li><a href="#">基本資料修改</a></li>
   </ul>
   <div class="container_1">
      <div class="tab">
      <p><?php
      $sql = "SELECT 證照名稱,考取學年,考取學期,國內國外,級別 FROM `data` where 學號 = '$student_id'";
      $result = execute_sql("License", $sql, $link);
	  echo "<table border='1' align='center' cellspacing='0' cellpadding='0'><tr align='center' bgcolor='FF8F19'>";
	  for ($i = 0; $i < mysql_num_fields($result); $i++)   
	  // 顯示欄位名稱
      echo "<td>" . mysql_fetch_field($result, $i)->name. "</td>";		
	  for ($j = 0; $j < mysql_num_rows($result); $j++)    
	  // 顯示欄位內容
      {
      echo "<tr>";				
      for ($k = 0; $k < mysql_num_fields($result); $k++)
      echo "<td>" . mysql_result($result, $j, $k) . "</td>";				
      }
      echo "</table>" ;
      mysql_free_result($result);
      mysql_close($link);
	?></p>
      </div>
      <div class="tab">
      <p>功能建制中</p>
      </div>
      <div class="tab">
      <p>功能建制中</p>
      </div>        
   </div>
</div>   

</div>

<div id="sidebar2">
	<div class="link">
	<p><img src="images/相關連結.png"></p>
	<ul>
	<li><a href="http://www.tpcu.edu.tw/bin/home.php">臺北城市科技大學</a></li>
	<li><a href="http://www.im.tpcu.edu.tw/bin/home.php">資訊管理系</a></li>
	<li><a href="http://203.64.215.79/tsint/">校務系統</a></li>
	<li><a href="http://eportfolio.tpcu.edu.tw/moodle/">Moodle線上學習平台</a></li>
	</ul>
	</div>
	<div class="link">
	<p><img src="images/ITIA.png"></p>
	<ul>
	<li><a href="http://itia.im.tpcu.edu.tw/itia2013/">ITIA研討會</a></li>
	</ul>

<ul>
kkkkk
	<li><a href="http://www.tpcu.edu.tw/bin/home.php">臺北城市科技大學</a></li>
	<li><a href="http://www.im.tpcu.edu.tw/bin/home.php">資訊管理系</a></li>
	<li><a href="http://203.64.215.79/tsint/">校務系統</a></li>
	<li><a href="http://eportfolio.tpcu.edu.tw/moodle/">Moodle線上學習平台</a></li>
	</ul>


	</div>
</div>
<div id="footer">版權宣告區</div>
</div>
</body>
</html>
