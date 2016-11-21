<?php
$link = mysqli_connect("140.112.107.81:13306", "root" , "2016sdmtest" , "eboard");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
mysqli_query($link, "set names utf8");
$course_Info = mysqli_query($link, "select * from web_course_information");
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>E-Board</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<link href="http://fonts.googleapis.com/css?family=Chivo:400,900" rel="stylesheet" />
	<link href="default.css" rel="stylesheet" type="text/css" media="all" />
	<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
<div id="wrapper">
	<div id="menu-wrapper">
		<div id="menu" class="container">
			<ul>
				<li class="current_page_item"><a href="#">主頁</a></li>
				<li><a href="#">關於我們</a></li>
				<li><a href="#">登入</a></li>
			</ul>
		</div>
		<!-- end #menu --> 
	</div>
	<div id="banner">
		<div id="logo">
			<h1><a href="index.html">E-Board</a></h1>
		</div>
	</div>
	<div id="page" class="container">
		<div id="content">
			<div class="title">
				<h2>最新訊息</h2>
				<span class="byline"></span> 
			</div>
			<table id="table">
			<?php
                        for($i=1; $i<=10; $i++){
                            $rs = mysqli_fetch_row($course_Info);
			    $course_Name = mysqli_query($link, "select 'Web_name' from website where 'Web_ID' = $rs[1]");
			    $anouce_Date = $rs[3];
                            $information = $rs[6];
                   	     
                           if(strlen($information) <= 80){  
				echo "<tr><td>". "[". $course_Name . "] ". $anouce_Date. ": ". $information . "</td></tr>";
			   }	
       			   else{	
				$information_short = mb_substr( $information, 0, 50, "utf-8");
                                echo "<tr><td>". "[". $course_Name . "] ". $anouce_Date. ": ". $information_short . "<a href=\"#\" class=\"jastips\">". "...more". "<span>". "[". $course_Name . "] ". $anouce_Date. ": ". $information. "</span></a></td></tr>";
                    
			   }
                       }
                       ?>
			</table>
			</div>
		<div id="sidebar">
			<div class="title">
				<h2>場館消息</h2>
			</div>
			<ul class="style2">
				<li><a href="#">08:00-22:00 圖書館</a></li>
				<li><a href="#">08:00-22:00 健身房</a></li>
				<li><a href="#">08:00-22:00 LAB</a></li>
				<li><a href="#">08:00-22:00 管一</a></li>
				<li><a href="#">08:00-22:00 社科圖</a></li>
				<li><a href="#">08:00-22:00 管二</a></li>
				<li><a href="#">08:00-22:00 台科</a></li>
			</ul>
		</div>
	</div>
</div>
</body>
</html>

