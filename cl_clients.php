<!DOCTYPE HTML>
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>SEX, drugs & rock-n-roll</title>
</head>
<body>

<h2>Клиенты</h2> 


<?php
session_start();
$mysqli = new mysqli("80.243.15.51","qwe","123", "RDSDB");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
$mysqli->set_charset("unicode");

$res=$mysqli->query("SELECT * FROM clients;");
$row=$res->fetch_assoc();
$i=1;
while($row!=false)
{
$_SESSION['client']=$row['name'];
?>
<p><a target="main" href="cl_client_info.php?client=<?echo $row['name'];?>" ><?echo $row['name'];?></a>
<? $row=$res->fetch_assoc();$i++;}?>
<hr>
<p align="bottom"><a target="main" href="cl_add_client.php" >Добавить клиента</a></p>
</body>
</html>