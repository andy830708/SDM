nk = mysqli_connect("140.112.107.81:13306", "root" , "2016sdmtest" , "eboard");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
mysqli_query($link, "set names utf8");
$data = mysqli_query($link, "select * from web_course_information");
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
				<li class="current_page_item"><a href="#">�D��</a></li>
				<li><a href="#">����ڭ�</a></li>
				<li><a href="#">�n�J</a></li>
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
				<h2>�̷s�T��</h2>
				<span class="byline"></span> </div>
				<table id="table">
					<?php
                        for($i=1; $i<=10; $i++){
                            $rs = mysqli_fetch_row($data);
                            $anouce_Date = $rs[3];
                            $information = $rs[6];
                    ?>
                            <?php
								if(strlen($information) <= 80){
                            ?>
								<tr><td><?php echo "[SDM] "+$anouce_Date+ ": "+ $information;?></td></tr>
                            <?php
								}
								else{
								$information_short = my_substr( $information, 0, 60, "utf-8");
                            ?>
								<tr><td><?php echo "[SDM] "+ $anouce_Date+ ": "+ $information_short;?><a href="#" class="jastips">...more<span><?php echo "[SDM] "+ $anouce_Date+ ": "+ $information;}?></span></a></td></tr>
                    <?php
						}
                    ?>
					<tr><td>[SDM]11/14: slides for Design Patterns and some code examples available.</td></tr>
					<tr><td>[SDM]11/02: HW#4 due 2PM 11/16.</td></tr>
					<tr><td>[SDM]10/27: Term Project finalized; it is identical to the draft of 10/20.</td></tr>
					<tr><td>[SDM]10/27: slides for Bluemix and for Team Collaboration available.</td></tr>
					<tr><td>[SDM]10/20: Draft of Term Project revised for further feedbacks, to be finalized by 10/26.</td></tr>
					<tr><td>[SDM]10/19: HW#3 due 2PM 10/26.</td></tr>
					<tr><td>[SDM]10/12: data modeling group exercise due 5:30PM 10/17; email <a href="#" class="jastips">...more<span>10/12: data modeling group exercise due 5:30PM 10/17; email completed solutions to the instructors.</span></a></td></tr>
					<tr><td>[SDM]10/12: contact email addresses of domain modeling instructors<a href="#" class="jastips">...more<span>10/12: contact email addresses of domain modeling instructors: Xscar_su@gss.com.twX, Xlynn_lin@gss.com.twX, Xpauline_peng@gss.com.twX (between the enclosing pair of X's).</span></a></td></tr>
					<tr><td>[SDM]10/12: slides for Domain Modeling available.</td></tr>
					<tr><td>[SDM]10/12: slides for UML Diagrams available.</td></tr>
				</table>
			</div>
		<div id="sidebar">
			<div class="title">
				<h2>���]����</h2>
			</div>
			<ul class="style2">
				<li><a href="#">08:00-22:00 �Ϯ��]</a></li>
				<li><a href="#">08:00-22:00 ������</a></li>
				<li><a href="#">08:00-22:00 LAB</a></li>
				<li><a href="#">08:00-22:00 �ޤ@</a></li>
				<li><a href="#">08:00-22:00 �����</a></li>
				<li><a href="#">08:00-22:00 �ޤG</a></li>
				<li><a href="#">08:00-22:00 �x��</a></li>
			</ul>
		</div>
	</div>
</div>
</body>
</html>

