<!DOCTYPE HTML>
<html>
 <head>
  <BASE TARGET="_main">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>RDS enter personal account</title>
</head>
<body>
<?
session_start();
$mysqli = new mysqli("80.243.15.51","qwe","123", "RDSDB");

$res=$mysqli->query("UPDATE `devices` SET owner = '".$_POST['cl']."' WHERE id =".$_POST['dev'].";");
header('Location: /cl_panel.php');
?>

</body>
</html>