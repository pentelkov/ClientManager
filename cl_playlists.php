<!DOCTYPE HTML>
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>SEX, drugs & rock-n-roll</title>
</head>
<body>

<h2>Плейлисты в базе данных</h2> 
<table border="2">
<tr>
<td>Номер</td>
<td>Название</td>
<td>Описание</td>
</tr>
<?php
require_once('KalturaAPI/KalturaClient.php');
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
$client->setKs($results);


session_start();
$mysqli = new mysqli("80.243.15.51","qwe","123", "RDSDB");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
$mysqli->set_charset("unicode");

$res=$mysqli->query("SELECT * FROM playlists;");
$row=$res->fetch_assoc();

$i=1;
while($row!=false)
{
	$id = $row['id'];
$playlist = $client->playlist->get($id, $version);
?>
<tr>
<td><?echo $i;?></td>
<td>
<?echo $playlist->name; ?>
</td>
<td>
<?
echo "<textarea cols=\"60\">";
$ids=explode(",", $playlist->playlistContent);

foreach ($ids as $kay => $value) {
	$entry = $client->media->get($value, $version);
	echo $entry->name."\n";
}

echo "</textarea>"; 

?>
</td>
</tr>
<? $row=$res->fetch_assoc();$i++;}?>
</table>
</body>
</html>