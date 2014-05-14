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
$res=$mysqli->query("INSERT INTO `devices` (`id`, `name`, `comment`) VALUES (NULL, '".$_POST['name']."','".$_POST['desc']."');");
$path="/server_minipc/".$_POST['name'];
mkdir($path);
header('Location: /cl_panel.php?type=1');
exit;	
?>

</body>
</html>