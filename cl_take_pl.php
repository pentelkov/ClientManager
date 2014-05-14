<!DOCTYPE HTML>
<html>
 <head>
  <BASE TARGET="_main">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>RDS enter personal account</title>
</head>
<body>
<h2>Выберите устройство и плейлист</h2> 
<?
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
?>
  <form action="cl_take_playlist.php" method="post">   
   <p><select name="dev" required >
    <option disabled selected>Выберите устройство</option>
    <?
    $res=$mysqli->query("SELECT * FROM devices;");
    $row=$res->fetch_assoc();
    while($row!=false) {
    	echo "<option value=\"".$row['id']."\">".$row['name']."</option>";
    $row=$res->fetch_assoc();    
    }
    ?>
   </select></p>
   <p><select name="pl" required >
    <option disabled selected>Выберите плейлист</option>
    <?
    $res=$mysqli->query("SELECT * FROM playlists;");
    $row=$res->fetch_assoc();

    while($row!=false) {
    	$playlist = $client->playlist->get($row['id'], $version);
    	echo "<option value=\"".$row['id']."\">".$playlist->name."</option>";
    $row=$res->fetch_assoc();    
    }
    ?>
   </select></p>
   <p><input type="submit" value="Назначить"></p>
  </form>
</body>
</html>