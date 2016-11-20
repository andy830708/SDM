<?php
header('Content-Type: text/html; charset=UFT-8');
$conn = @mysqli_connect("140.112.107.81:13306","root", "2016sdmtest", "eboard");
mysqli_set_charset($conn,"utf8");
if (mysqli_connect_errno())
  die("error Mr. ");


$sql = "insert into website(web_id,web_name) values('123','你好')";
$result = mysqli_query($conn, $sql);
/*
 while($row = mysqli_fetch_array($result)){
$i=0;
	while($i<7){

    echo $row[$i++]." ";
	}
	echo "\n";
}
*/
?>
