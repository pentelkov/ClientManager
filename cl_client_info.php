<!DOCTYPE HTML>
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>RDS media</title>
</head>
<body>
<?
session_start();
$mysqli = new mysqli("80.243.15.51","qwe","123", "RDSDB");
if($_GET['client']!="")
{
$res=$mysqli->query("SELECT * FROM clients WHERE name='".$_GET['client']."';");
}
else if($_GET['clientid']!=NULL) 
{
$res=$mysqli->query("SELECT * FROM clients WHERE id='".$_GET['clientid']."';");
}
else {
echo "Выберите пользователя для детальной информации";
 }
$row=$res->fetch_assoc();	
?>
<h2>Данные о клиенте <?echo $row['name']?></h2> 
<p>Список устройств: <textarea><? 
$res=$mysqli->query("SELECT * FROM devices WHERE owner=".$row['id']);
$row1=$res->fetch_assoc();
while($row1!=false) {
	echo $row1['name']."\n" ;
	$row1=$res->fetch_assoc();
}
?></textarea>
<p>Комментарий: <textarea><? echo $row['comment']; ?></textarea>
<? $_SESSION['client']=$row['id'];?>
<a href="cl_client_del.php" >Удалить клиента</a>
</body>
</html>