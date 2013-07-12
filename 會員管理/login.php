<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>資訊管理系 - 證照查詢系統</title>
<link href="css/layout.css" rel="stylesheet" type="text/css" />
<link href="css/login_layout.css" rel="stylesheet" type="text/css" />
<link href="css/menu.css" rel="stylesheet" type="text/css" />
<script src="jquery-1.7.1.js"></script>
    <script type="text/javascript">
      function check_data()
      {
        if (document.myForm.student_id.value.length == 0)
          alert("帳號不可以空白");
        else if (document.myForm.password.value.length == 0)
          alert("密碼不可以空白");
        else 
          myForm.submit();
      }
    </script>
<!--主選單開始-->
<script language="JavaScript">
$(document).ready(function(){
  $('#menu li ul').hide();
  $('#menu li').hover(
    function() {
       $(this).find('ul').slideDown('fast');
       $(this).find('a:first').addClass('active');
    },function() {
       $(this).find('.submenu').fadeOut('fast');
       $(this).find('a').removeClass("active");
    });
});
</script>
<!--主選單結束-->
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
	    header("location:index.php");
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
	<p><a href=#>資本資料修改</a></p>
	<p><a href="logout.php">登出網站</a></p>
	</div>
	<div class="function">
	<p><img src="images/主選單.png"></p>
   	<ul id="menu">
      		<li><a href="#">主選單</a>
         	<ul class="submenu">
          	<li><a href="#">回首頁</a></li>
          	<li><a href="main.php">證照查詢</a></li>
          	<li><a href="#">HTML 5</a></li>
        </ul>
	</div>
</div>
<div id="content">
	<div id="accordion">
	<div class="catalog">
		<h4>最新消息</h4>
	</div>
	<ul class="item">
		<li><a href='#'>Java</a></li> 
		<li><a href='#'>Visual Basic</a></li> 
		<li><a href='#'>Visual C#</a></li>
	</ul>
	<div class="catalog">
		<h4>系上公告</h4>
	</div>
	<ul class="item">
		<li><img src="images/pdf.gif"><a href='pdf/pta_7114_9707079_07181.pdf'> 102學年度行事曆</a></li> 
		<li><img src="images/pdf.gif"><a href='#'> 101學年度行事曆</a></li> 
		<li><img src="images/pdf.gif"><a href='#'> 100學年度行事曆</a></li>
		<li><img src="images/pdf.gif"><a href='#'> 99學年度行事曆</a></li>
	</ul>
	<div class="catalog">
		<h4>登錄流程</h4>
	</div>
	<ul class="item">
		<li><a href='#'>Java</a></li> 
		<li><a href='#'>Visual Basic</a></li> 
		<li><a href='#'>Visual C#</a></li>
	</ul>
	<div class="catalog">
		<h4>重要事項</h4>
	</div>
	<ul class="item">
		<li><a href='#'>Java</a></li> 
		<li><a href='#'>Visual Basic</a></li> 
		<li><a href='#'>Visual C#</a></li>
		<li><a href='#'>HTML</a></li>
		<li><a href='#'>PHP</a></li>
		<li><a href='#'>JavaScript</a></li>
		<li><a href='#'>jQuery</a></li>
		<li><a href='#'>MySQL</a></li>
	</ul>
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
	</div>
</div>
<div id="footer">版權宣告區</div>
    </div>
</body>
</html>
