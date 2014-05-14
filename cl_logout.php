<?php
session_start();
$_SESSION['name']="";
$_SESSION['logged']=false;
header('Location: /cl_login.php');
exit;
?>