<?php
$link = mysqli_connect("172.10.0.22:3306", "root" , "2016sdmtest" , "eboard");
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
	<!--			<li class="current_page_item"><a href="#">MainPage</a></li>
				<li><a href="#">Ãö©ó§Ú­Ì</a></li>
				<li><a href="#">µn¤J</a></li>
	!-->		</ul>
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
			$course_Info = mysqli_query($link, "select * from web_course_information order by web_id");
			#-----------here is for first DEMO------------
			$tmp_course_name = "first";
			#--------end--------
                        for($i=1; $i<=mysqli_num_rows($course_Info); $i++){
                            $rs = mysqli_fetch_row($course_Info);
			    $course_tName = mysqli_query($link, "select Web_name from website where Web_ID = '$rs[1]'");
			    $course_Name = mysqli_fetch_row($course_tName);
			    #-----------here is for first DEMO-----------
			    if($tmp_course_name != $course_Name[0]){
				$tmp_course_name = $course_Name[0];
				echo "<tr><td><br/><font size=\"20\"><b>" . $tmp_course_name . "</b></font></td></tr>";
			    }
			    #----------end----------
			    $anouce_Date = $rs[3];
                            $information = $rs[6];
                   	     
                           if(strlen($information) <= 80){  
				echo "<tr><td>". $anouce_Date. ": ". $information . "</td></tr>";
			   }	
       			   else{	
				$information_short = mb_substr( $information, 0, 60, "utf-8");
                                echo "<tr><td>". $anouce_Date. ": ". $information_short . "<a class=\"jastips\">". "...more". "<span>".  $anouce_Date. ": ". $information. "</span></a></td></tr>";
                    
			   }
			}

			$activity = mysqli_query($link, "select * from web_public_information order by web_id");
			#first demo 
			$anouce_name = "first";
			#end
			for($i=1; $i<=mysqli_num_rows($activity); $i++){
			  $rs = mysqli_fetch_row($activity);
			  $anouce_tType = mysqli_query($link, "select Web_name from website where Web_ID = '$rs[1]'");
		   	  $anouce_type  = mysqli_fetch_row($anouce_tType); 
  		   	  if($anouce_name != $anouce_type[0]){
			    $anouce_name = $anouce_type[0];
			    echo "<tr><td><br/><font size=\"20\"><strong><b>". $anouce_name ."</b></strong></font></td></tr>"; 
		  	  }
	 	   	  $information = $rs[6];
		  	  $URL = $rs[5];
			  $start_date = $rs[8];
			  $end_date = $rs[9];
			    
			  if($URL == NULL){
				if(strlen($information) <= 72){
					 echo "<tr><td>[". $start_date . " ~ " . $end_date . "]<a target=\"_blank\">" . $information . "</a>" . "</td></tr>";
				}else{
					$information_short = mb_substr( $information, 0, 25, "utf-8");
 					
		   			echo "<tr><td>[" . $start_date . " ~ " . $end_date . "]<a target=\"_blank\" href=\"" .$URL . "\">" . $information_short . "</a> <a class=\"jastips\">" . "...more" . "<span>[" . $start_date . " ~ " . $end_date . "]</br>" . $information . "</span></a></td></tr>";
                       		 }
			} else{
				if(strlen($information) <= 72){
					echo "<tr><td>[" . $start_date . " ~ " . $end_date ."]<a target=\"_blank\" href=\"" . $URL . "\">" . $information . "</a>"  ."</td></tr>";
				}else{
					$information_short = mb_substr( $information, 0, 25, "utf-8");
					echo "<tr><td>[" . $start_date . " ~ " . $end_date . "]<a target=\"_blank\" href=\"" .$URL . "\">" . $information_short . "</a> <a class=\"jastips\">" . "...more" . "<span>[" . $start_date . " ~ " . $end_date . "]</br>" . $information . "</span></a></td></tr>";
			}
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
				<li><a href="#">08:00-22:30 Library</a></li>
			</ul>
		</div>
	</div>
</div>
</body>
</html>

