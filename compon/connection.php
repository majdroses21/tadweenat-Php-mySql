<?php
#كود الاتصال ب قاعدة البيانات
$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'tadwenat';

$conn = mysqli_connect($host,$user,$pass,$db);
/*
#التحقق من الاتصال ب قاعدةالبيانات 
if (isset($conn)) {
  echo ('connected');
}
else{
  echo ('not connected');
}
*/

?>