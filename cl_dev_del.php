<!DOCTYPE HTML>
<html>
 <head>
  <BASE TARGET="_parent">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>RDS enter personal account</title>
</head>
<body>
<?
$mysqli = new mysqli("80.243.15.51","qwe","123", "RDSDB");
$res=$mysqli->query("SELECT * FROM `devices` WHERE `id` = '".$_GET['id']."'");
$row=$res->fetch_assoc();
//echo "DELETE FROM `playlists` WHERE `id` = '".$_GET['id']."'";
$path="/server_minipc/".$row['name'];
rmdir($path);
$res=$mysqli->query("DELETE FROM `devices` WHERE `id` = '".$_GET['id']."'");
header('Location: /cl_devs.php');
exit;	
?>

</body>
</html>