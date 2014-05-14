<!DOCTYPE HTML>
<html>
 <head>
  <BASE TARGET="main">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF8">
  <title>RDS enter personal account</title>
</head>
<body>
<?
$mysqli = new mysqli("80.243.15.51","qwe","123", "RDSDB");
$mysqli->set_charset("utf8");
$res=$mysqli->query("INSERT INTO `locations` (
`id`, 
`name`, 
`addr`,
`status`,
`map_x`,
`map_y`,
`metro`,
`num_panels`,
`trello`,
`internet`,
`comment`) 
VALUES (
NULL, 
'".$_POST['name']."', 
'".$_POST['addr']."',
'".$_POST['status']."',
'".$_POST['map_x']."', 
'".$_POST['map_y']."', 
'".$_POST['metro']."', 
'".$_POST['num_panels']."',
'".$_POST['trello']."', 
'".$_POST['internet']."', 
'".$_POST['comm']."');");
header('Location: /cl_loclist.php');
exit;	
?>

</body>
</html>
