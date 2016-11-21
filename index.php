<?php
$link = mysqli_connect("140.112.107.81:13306", "root" , "2016sdmtest" , "eboard");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
mysqli_query($link, "set names utf8");
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
		<!--		<li class="current_page_item"><a href="#">MainPage</a></li>
				<li><a href="#">Ãö©ó§Ú­Ì</a></li>
				<li><a href="#">µn¤J</a></li>
		--!>	</ul>
		</div>
		<!-- end #menu --> 
	</div>
	<div id="banner">
		<div id="logo">
			<h1><a href="index.php">E-Board</a></h1>
		</div>
	</div>
	<div id="page" class="container">
		<div id="content">
			<div class="title">
				<h2>The Latest News</h2>
				<span class="byline"></span> 
			</div>
			<table id="table">
			<?php
			$course_Info = mysqli_query($link, "select * from web_course_information order by announcement_date desc");
                        for($i=1; $i<=mysqli_num_rows($course_Info); $i++){
                            $rs = mysqli_fetch_row($course_Info);
			    $course_tName = mysqli_query($link, "select Web_name from website where Web_ID = '$rs[1]'");
			    $course_Name = mysqli_fetch_row($course_tName);
			    
			    $anouce_Date = $rs[3];
                            $information = $rs[6];
                   	     
                           if(strlen($information) <= 50){  
				echo "<tr><td>". "[". $course_Name[0] . "] ". $anouce_Date. ": ". $information . "</td></tr>";
			   }	
       			   else{	
				$information_short = mb_substr( $information, 0, 40, "utf-8");
                                echo "<tr><td>". "[". $course_Name[0] . "] ". $anouce_Date. ": ". $information_short . "<a href=\"#\" class=\"jastips\">". "...more". "<span>". "[". $course_Name[0] . "] ". $anouce_Date. ": ". $information. "</span></a></td></tr>";
                    
			   }
                       }
                       ?>
			</table>
			</div>
		<div id="sidebar">
			<div class="title">
				<h2>Open Time</h2>
			</div>
			<ul class="style2">
				<li><a href="#">08:00-22:00 Library</a></li>
				<li><a href="#">08:00-22:00 GYM</a></li>
				<li><a href="#">08:00-22:00 LAB</a></li>
				<li><a href="#">08:00-22:00 Building</a></li>
				<li><a href="#">08:00-22:00 Social</a></li>
				<li><a href="#">08:00-22:00 Builiding</a></li>
				<li><a href="#">08:00-22:00 NTU</a></li>
			</ul>
		</div>
	</div>
</div>
</body>
</html>

