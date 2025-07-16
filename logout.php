<?php

session_start();
$session=array();
session_destroy();
header("location:homepage.html");


?>