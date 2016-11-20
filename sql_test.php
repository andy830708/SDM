<?php
header('Content-Type: text/html; charset=UFT-8');
$conn = @mysqli_connect("140.112.107.81:13306","root", "2016sdmtest", "eboard");
mysqli_set_charset($conn,"utf8");
if (mysqli_connect_errno())
  die("error Mr. ");

$sql = "SELECT * FROM web_course_information";
$result = mysqli_query($conn, $sql);

 while($row = mysqli_fetch_array($result)){
    echo $row."\n";
}

?>