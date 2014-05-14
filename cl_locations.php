<!DOCTYPE HTML>
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>SEX, drugs & rock-n-roll</title>
</head>
<body>

<h2>Список локаций</h2> 
<table border="2">
<tr>
<td>Название локации</td>
<td>Адрес</td>
<td>Ближайшее метро</td>
<td>Статус</td>
</tr>
<?
/*require_once('KalturaAPI/KalturaClient.php');
$partnerId = 105;
$config = new KalturaConfiguration($partnerId);
$config->serviceUrl = 'http://console.rdsmedia.tv/';
$client = new KalturaClient($config);
$secret = null;
$userId = null;
$type = null;
$partnerId = null;
$expiry = null;
$privileges = null;
$secret = 'ae192d131f231a80a2cdd1ccda235466';
$results = $client->session->start($secret, $userId, $type, $partnerId, $expiry, $privileges);
$id = null;
$version = null;
$client->setKs($results);*/

session_start();
$mysqli = new mysqli("80.243.15.51","qwe","123", "RDSDB");

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
$mysqli->set_charset("utf8");

$res=$mysqli->query("SELECT * FROM locations;");
$row=$res->fetch_assoc();

$i=1;
while($row!=false)
{
?>
<tr <? if($row['status']=="Авария") echo "bgcolor=#ff0000"; ?> >
<td><a target="edit" href="cl_loc_edit.php?id=<? echo $row['id'];?>" ><? echo $row['name']; ?></a></td>
<td><? echo $row['addr']; ?></td>
<td><? echo $row['metro']; ?></td>
<td><? echo $row['status']; ?></td>
</tr>
<? 
$row=$res->fetch_assoc();
$i++;} ?>
</table>
</body>
</html>
