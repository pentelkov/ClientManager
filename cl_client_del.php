<!DOCTYPE HTML>
<html>
 <head>
  <BASE TARGET="_parent">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>RDS enter personal account</title>
</head>
<body>
<?
session_start();
$mysqli = new mysqli("80.243.15.51","qwe","123", "RDSDB");
//echo "DELETE FROM `playlists` WHERE `id` = '".$_GET['id']."'";
if($_SESSION['client']!=NULL) $res=$mysqli->query("DELETE FROM `clients` WHERE `id` = '".$_SESSION['client']."'");
header('Location: /cl_devs.php');
exit;	
?>

</body>
</html>