<?php
	$link = mysqli_connect("140.112.107.81:13306", "root" , "2016sdmtest" , "eboard");
	if (mysqli_connect_errno())
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }
	mysqli_query($link, "set names utf8");
	session_start();
?>
<?php
	function printDiv($id, $link, $course_Info){
		echo '<div class="col-md-3 ser-left2" id="w'.$id.'">';
			$course_tName = mysqli_query($link, "select Web_name from website where Web_ID = '".$id."'");
			$course_Name = mysqli_fetch_row($course_tName);
			$tmp_course_name = $course_Name[0];
			echo '<button type="button" class="close" aria-label="Close" value="'.$id.'" id="x'.$id.'">';
  				echo '<span aria-hidden="true">&times;</span>';
			echo '</button>';
			echo '<h3>'. $tmp_course_name .'</h3>';
			echo '<div id="myCarouselw'. $id .'" class="carousel slide">';
				$total_row = mysqli_num_rows($course_Info);
				$slide = (int)$total_row/3;
				echo '<ol class="carousel-indicators">';
				echo '<li data-target="#myCarouselw'. $id. '" data-slide-to="0" class="active"></li>';
				for($r=1; $r<$slide; $r++){
					echo '<li data-target="#myCarouselw'. $id .'" data-slide-to="'.$r.'"></li>';
				}
				echo '</ol>';
				echo '<div class="carousel-inner">';
	}

	function printINFO($course_Info, $id, $num){
		for($j=1; $j<=mysqli_num_rows($course_Info); $j+=3){
			if($j==1){
				echo '<div class="active item">';
				for($k=$j; $k<$j+3; $k++){
					if($k <=mysqli_num_rows($course_Info)){
						$rs = mysqli_fetch_row($course_Info);
						$information = $rs[6];
						$URL = $rs[5];
						$anouce_Date = $rs[3];
						$start_date = $rs[8];
						$end_date = $rs[9];
						if($URL == NULL){
							noURL($id, $num, $information, $k, $start_date, $end_date, $anouce_Date);
					    }else{
					     	yesURL($id, $num, $information, $k, $start_date, $end_date, $anouce_Date, $URL);
					    }
						$num++;
					}
				}
				echo '</div>';	
			}
			if($j>3 && $j%3==1){
				echo '<div class="item">';
				for($k=$j; $k<$j+3; $k++){
					if($k <=mysqli_num_rows($course_Info)){
						$rs = mysqli_fetch_row($course_Info);
						$information = $rs[6];
						$URL = $rs[5];
						$anouce_Date = $rs[3];
						$start_date = $rs[8];
						$end_date = $rs[9];
						if($URL == NULL){
							noURL($id, $num, $information, $k, $start_date, $end_date, $anouce_Date);
					    }else{
					    	yesURL($id, $num, $information, $k, $start_date, $end_date, $anouce_Date, $URL);
					    }
					    $num++;
					}
				}
				echo '</div>';
			}
		}

					echo '</div>';
				echo '</div>';	
			echo '</div>';
	}

	function noURL($id, $num, $information, $k, $start_date, $end_date, $anouce_Date){
		echo '<div class="accordion" id="accordion2">';
			echo '<div class="accordion-group">';
				echo '<div class="accordion-heading">';
					echo '<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse'.$id. $num .'">';
						anouce($k, $start_date, $end_date, $anouce_Date);
					echo '</a>';
				echo '</div>' ;
			echo '<div id="collapse'.$id. $num .'" class="accordion-body collapse in">';
		echo '<div class="accordion-inner">';
			echo $information;
			echo '</div>';
		echo '</div>';
	echo '</div>';
echo '</div>';
	}

	function yesURL($id, $num, $information, $k, $start_date, $end_date, $anouce_Date, $URL){
		echo '<div class="accordion" id="accordion2">';
			echo '<div class="accordion-group">';
				echo '<div class="accordion-heading">';
					echo '<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse'.$id. $num .'">';
				       anouce($k, $start_date, $end_date, $anouce_Date);	
					echo '</a>';
				echo '</div>' ;
			echo '<div id="collapse'.$id. $num .'" class="accordion-body collapse in">';
		echo '<div class="accordion-inner">';
			echo '<a target="_blank" href="'. $URL . '">'. $information.'</a>';
			echo '</div>';
		echo '</div>';
	echo '</div>';
echo '</div>';
	}

	function anouce($k, $start_date, $end_date, $anouce_Date){
		if($start_date != null){
			echo $k.'. ['.$start_date.' ~ '. $end_date .'] ';
		}else if($anouce_Date !=null){
			echo $k.'. ['. $anouce_Date . '] ';
		}else if($anouce_Date == null && $start_date == null){
			echo $k.'. ';
		}	
	}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Home</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Thronged Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="applijewelleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />	
<script src="js/jquery-1.11.1.min.js"></script>
<!--webfonts-->
<link href='https://fonts.googleapis.com/css?family=Antic' rel='stylesheet' type='text/css' />
<link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,400,300,600,700|Six+Caps' rel='stylesheet' type='text/css' />
   <!--//webfonts-->
<script type="text/javascript" src="js/bootstrap.js"></script>
<!------ Light Box ------>
<link rel="stylesheet" href="css/swipebox.css">
    <script src="js/jquery.swipebox.min.js"></script> 
    <script type="text/javascript">
		jQuery(function($) {
			$(".swipebox").swipebox();
		});
	</script>
    <!------ Eng Light Box ------>
<script type="text/javascript" src="js/move-top.js"></script>
       <script type="text/javascript" src="js/easing.js"></script>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
				});
			});
		</script>
		<script type="text/javascript">
		$(document).ready(function() {
				/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
				*/
		$().UItoTop({ easingType: 'easeOutQuart' });
});
</script>


</head>
<body>
<!-- banner -->
	<div class="banner" id="banner">
		<div class="container">	
			<div class="header-bottom">
		<div class="container">
			<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
				<div class="navbar-left">
					<h1><a href="index.php">E-board</a></h1>
				</div>
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<!--/.navbar-header-->
				<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li><a href="#banner" class="scroll">Home</a></li>
						<li><a href="#about" class="scroll">Activity</a></li>
						<li><a href="#case" class="scroll">Admin</a></li>
						<li><a href="#services" class="scroll">Courses</a></li>
						<li class="login"><a href="./login/index.php">Login</a></li>
						<li class="logout"><a href="index.php">Logout</a></li>
					</ul>
				</div>
				<!--/.navbar-collapse-->
			</nav>
		</div>
	</div>
			<div class="banner-info">
				<h2>Provide everything you want!</h2>
			</div>
			<div class="sayHI">
				<h3>Hello, r05725038</h3>
			</div>
		</div>
	</div>
<!-- banner -->

<!-- project -->
	<div class="project" id="about">
		<div class="container">
		<div class="title">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<div class="col-md-3"></div>
				<div class="col-md-4">
					<h2>Activity</h2>
				</div>
				<div class="col-md-4">
					<div class="dropdown">
								<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
								    <span class="caret"></span>
								</button>
								<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
									<li role="presentation" class="dropdown-header"><a>Choose your activity</a></li>
									<?php
										$course_name = mysqli_query($link, "select * from website where Web_type<>'課程' order by web_id");
										$course_ID = mysqli_query($link, "select * from website where Web_type<>'課程' order by web_id");
										for($i=1; $i<=mysqli_num_rows($course_name); $i++){
											$id = mysqli_fetch_row($course_ID);
											$rs = mysqli_fetch_row($course_name);
											$query = "select Web_name, Web_ID from website where Web_ID ='" .$rs[0]."'" ;
											$course_tName = mysqli_query($link, $query);
											$course_Name = mysqli_fetch_row($course_tName);
											if($course_Name[1] == 002) continue;
											echo '<li role="presentation"><a value="'.$id[0].'" id="b'. $id[0] .'">'. $course_Name[0] .'</a></li>';
										}
									?>
								</ul>
					</div>
				</div>
			</div>
		</div>
			<div class="project-top">
				<div class="col-md-6 project-right">
					<img src="images/acti.jpg" alt=" " class="img-responsive">
				</div>
				<div class="col-md-6 project-left">
						        <h3>開放時間</h3>
						    <table class="table table-condensed">
						    	<tr><td></td><td>圖書館</td><td>新體</td></tr>
								<tr><td>Monday</td><td>8:00 ~ 22:30</td><td>6:00 ~ 22:00</td></tr>
								<tr class="wed"><td>Tuesday</td><td>8:00 ~ 22:30</td><td>6:00 ~ 22:00</td></tr>
								<tr><td>Wednesday</td><td>8:00 ~ 22:30</td><td>6:00 ~ 22:00</td></tr>
								<tr><td>Thursday</td><td>8:00 ~ 22:30</td><td>6:00 ~ 22:00</td></tr>
								<tr><td>Friday</td><td>8:00 ~ 22:30</td><td>6:00 ~ 22:00</td></tr>
								<tr><td>Saturday</td><td>8:00 ~ 22:30</td><td>9:00 ~ 22:00</td></tr>
								<tr><td>Sunday</td><td>8:00 ~ 17:30</td><td>9:00 ~18:00</td></tr>
							</table>
				</div>
					<div class="clearfix"></div>
			</div>
			<!-- application -->
	<div class="application">
		
<?php
	$course_ID = mysqli_query($link, "select * from website where Web_type<>'課程' order by web_id");
	for($i=1; $i<=mysqli_num_rows($course_ID); $i++){
		$num = $i;
		$id = mysqli_fetch_row($course_ID);
		if($id[0] == 002) continue;
		$q_id = "select * from web_public_information where web_id ='" . $id[0] ."'order by Announcement_Date DESC";
		$course_Info = mysqli_query($link, $q_id);

		printDiv($id[0], $link, $course_Info);	
		printINFO($course_Info, $id[0], $num);			
	}
?>
	</div>
<!-- /application -->
		</div>
	</div>
	<!-- admin -->
	<div class="case" id="case">
		<div class="container">
		<div class="title">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<div class="col-md-3"></div>
				<div class="col-md-4">
					<h2>Admin</h2>
				</div>
				<div class="col-md-4">
					<div class="dropdown">
						<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
						    <span class="caret"></span>
						</button>
						<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
							<li role="presentation" class="dropdown-header"><a>Choose your admin</a></li>
							<?php
								// $course_name = mysqli_query($link, "select * from website where Web_type<>'課程' order by web_id");
								// $course_ID = mysqli_query($link, "select * from website where Web_type<>'課程' order by web_id");
								// for($i=1; $i<=mysqli_num_rows($course_name); $i++){
								// 	$id = mysqli_fetch_row($course_ID);
								// 	$rs = mysqli_fetch_row($course_name);
								// 	$query = "select Web_name, Web_ID from website where Web_ID ='" .$rs[0]."'" ;
								// 	$course_tName = mysqli_query($link, $query);
								// 	$course_Name = mysqli_fetch_row($course_tName);
								// 	if($course_Name[1] == 002) continue;
								// 	echo '<li role="presentation"><a value="'.$id[0].'" id="b'. $id[0] .'">'. $course_Name[0] .'</a></li>';
								// }
							?>
						   	
						</ul>
					</div>
				</div>
			</div>
		</div>
			<!-- <div class="ser-top"> -->

	<?php
		// $course_ID = mysqli_query($link, "select * from website where Web_type<>'課程' order by web_id");
		// for($i=1; $i<=mysqli_num_rows($course_ID); $i++){
		// 	$num = $i;
		// 	$id = mysqli_fetch_row($course_ID);
		// 	if($id[0] == 002) continue;
		// 	$q_id = "select * from web_public_information where web_id ='" . $id[0] ."'order by Announcement_Date DESC";
		// 	$course_Info = mysqli_query($link, $q_id);

		// 	printDiv($id[0], $link, $course_Info);	
		// 	printINFO($course_Info, $id[0], $num);			
		// }
	?>
			<!-- </div> -->
		</div>
	</div>
<!-- /case -->

	<!-- course -->
	<div class="services" id="services">
		<div class="container">
		<div class="title">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<div class="col-md-3"></div>
				<div class="col-md-4">
					<h2>Courses</h2>
				</div>
				<div class="col-md-4">
					<div class="dropdown">
						<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
						    <span class="caret"></span>
						</button>
						<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
							<li role="presentation" class="dropdown-header"><a>Choose your class</a></li>
							<?php
								$course_name = mysqli_query($link, "select * from website where Web_type='課程' order by web_id");
								$course_ID = mysqli_query($link, "select * from website where Web_type='課程' order by web_id");
								
								for($i=1; $i<=mysqli_num_rows($course_name); $i++){
									 $rs = mysqli_fetch_row($course_name);			
									 $id = mysqli_fetch_row($course_ID);
									 $query = "select Web_name from website where Web_ID ='" .$rs[0]."'" ;
									 $course_tName = mysqli_query($link, $query);
									 $course_Name = mysqli_fetch_row($course_tName);
									 echo '<li role="presentation"><a value="'.$id[0].'" id="b'. $id[0] .'">'. $course_Name[0] .'</a></li>';
								}
							?>
						</ul>
					</div>
				</div>
			</div>
		</div>
			<!-- <div class="ser-top"> -->

	<?php //ceiba課程
	//---------test for json---------
		// $json_data = array(
		// 	"課程一"=>array(
		// 	0=> array(
		// 		0=>"10/14",
		// 		1=>"看電影"
		// 		),
		// 	1=> array(
		// 		0=>"10/21", 
		// 		1=>"看電視"
		// 		),
		// 	2=> array(
		// 		0=>"10/212", 
		// 		1=>"  "
		// 		),
		// 	3=> array(
		// 		0=>"10/213", 
		// 		1=>"看電視"
		// 		) 
		// 	),
		// 	"課程二"=>array(
		// 		0=> array(
		// 			0=>"10/13", 
		// 			1=>"dd"),
		// 		1=> array(
		// 			0=>"10/20", 
		// 			1=>"cc")
		// 	)
		// 	);
		// $_SESSION['json'] = $json_data;
	//---------end---------
		if(isset($_SESSION['json'])){
			$id = 10;
			foreach ($_SESSION['json'] as $key => $value) {
				//看課程有沒有發布消息，有發布消息才會印出來
				$class = $value;
				$one_bool = false;//true代表有發佈訊息
				$annouce_num = 0;
				foreach ($class as $innerKey => $innerValue){
					if(strlen($innerValue[1]) <=1){
						continue;
					}else{
						$one_bool =true;
						$annouce_num++;						
					}
				}
				if($one_bool){//有發布消息，印出消息
					echo '<div class="col-md-3 ser-left2">';
						echo '<div class="accordion" id="accordion2">';
							echo '<div class="accordion-group">';
							    echo '<div class="accordion-heading">';
							      	echo '<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse' .$id  .'">';
							        echo '<h3>'. $key .'</h3>';
							      	echo '</a>';
							    echo '</div>' ;
							    echo '<div id="collapse' .$id .'" class="accordion-body collapse in">';
							      	echo '<div class="accordion-inner">';
								        echo '<div id="myCarousel'. $id  .'" class="carousel slide">';
								        	$slide = (int)$annouce_num/3;
											echo '<ol class="carousel-indicators">';
												echo '<li data-target="#myCarousel'.$id  .'" data-slide-to="0" class="active"></li>';
												for($r=1; $r<$slide; $r++){
													echo '<li data-target="#myCarousel' .$id .'" data-slide-to="'.$r.'"></li>';
												}
											echo '</ol>';
											echo '<div class="carousel-inner">';
											$annouce_tmp = 1;
											$class = $value;
											foreach ($class as $innerKey => $innerValue){
												if(strlen($innerValue[1]) >1){
													if($annouce_tmp<=3){
														if($annouce_tmp==1)
													    	echo '<div class="active item">';
				                            					if(strlen($innerValue[1]) <= 50){  
																	echo '<p>['.$innerValue[0].'] '.$innerValue[1].'</p>'; 
																}	
													       		else{	
																	$information_short = mb_substr( $innerValue[1], 0, 40, "utf-8");
													                echo '<p>['. $innerValue[0]. '] '. $information_short . '<a class="jastips">'. '..more'. '<span>['.  $anouce_Date.'] '. $innerValue[1]. '</span></a></p>';
																}
															
														
														if($annouce_tmp==3 || $annouce_tmp==$annouce_num)
															echo '</div>';
														$annouce_tmp++;
													}else{
														if($annouce_tmp%3 == 1)
												    		echo '<div class="item">';

																if(strlen($innerValue[1]) <= 50){  
																	echo '<p>['.$innerValue[0].'] '.$innerValue[1].'</p>'; 
																}	
													       		else{	
																	$information_short = mb_substr( $innerValue[1], 0, 40, "utf-8");
													                echo '<p>['. $innerValue[0]. '] '. $information_short . '<a class="jastips">'. '..more'. '<span>['.  $anouce_Date.'] '. $innerValue[1]. '</span></a></p>';
																}
					                            			
													
															
														if($annouce_tmp%3 == 0 || $annouce_tmp==$annouce_num)
													    	echo '</div>';
													    $annouce_tmp++;
													}
												}
											}
										$id++;
											echo '</div>';
										echo '</div>';
							      	echo '</div>';
							    echo '</div>';
						  	echo '</div>';
						echo '</div>';	
					echo '</div>';
				}
			}
		}		
	?>
	<?php //爬蟲課程
		$course_ID = mysqli_query($link, "select * from website where Web_type='課程' order by web_id");
		for($i=1; $i<=mysqli_num_rows($course_ID); $i++){
			$num = $i;
			$id = mysqli_fetch_row($course_ID);
			$q_id = "select * from web_course_information where web_id ='" . $id[0] ."'order by Announcement_Date DESC";
			$course_Info = mysqli_query($link, $q_id);
				printDiv($id[0], $link, $course_Info);
				printINFO($course_Info, $id[0], $num);
		}
	?>
			<!-- </div> -->
		</div>
	</div>
<!-- /services -->
</body>
</html>

<?php //顯示user上次的內容
	$member_id = $_SESSION['userName'];//這邊要改去接Id
	$sql = "SELECT * FROM website where web_id in ( SELECT Web_ID from selection where Member_ID = '".$member_id."') ";
	$user_table = mysqli_query($link, $sql);
	echo '<script>';
	for($i=1; $i<=mysqli_num_rows($user_table); $i++){
		$user_want_to_see = mysqli_fetch_row($user_table);
		echo '$("#w'.$user_want_to_see[0].'").css("display" , "block");';
		echo '$("#b'.$user_want_to_see[0].'").css("display", "none");';
	}
	echo '</script>';
?>