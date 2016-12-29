<?php
session_start();
$userName = $_POST['userName'];
$password = $_POST['password'];

$url =  "http://140.112.107.81:5000/login";
$data = array('acc' => $userName, 'pwd' => $password);

// use key 'http' even if you send the request to https://..
$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded",
        'method'  => 'POST',
        'content' => http_build_query($data)
    )
);
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);

if (strcmp($result, "login successful")) { // Handle error
  $_SESSION['userName'] = $userName;
  echo true;
} else{
  echo false;
}

?>
