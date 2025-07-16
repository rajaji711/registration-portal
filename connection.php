<?php

$host='localhost';
$user='root';
$password='';
$dbname='registration_portal';
$conn = mysqli_connect('localhost','root','','registration_portal');

 if($conn==false){
  die('Error:cannot connect');
 }
 
?>