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
$res=$mysqli->query("INSERT INTO `clients` (`id`, `name`, `videoid`, `audioid`, `comment`) VALUES (NULL, '".$_POST['name']."', '0', '0', '".$_POST['desc']."');");
header('Location: /cl_panel.php?type=1');
exit;	
?>

</body>
</html>