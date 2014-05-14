<!DOCTYPE HTML>
<html>
 <head>
  <BASE TARGET="_parent">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>RDS enter personal account</title>
</head>
<body>
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
//if($_SESSION['client']=="") {
//echo "Клиент не выбран.";	
//exit;
//	} else {
		//echo $_SESSION['client'];
//if(isset($_GET['mode']) && $_GET['mode']==1) 
//{
//delete existed

$res=$mysqli->query("UPDATE `devices` SET playlist = '".$_POST['pl']."' WHERE id =".$_POST['dev'].";");
$res=$mysqli->query("SELECT * FROM `devices` WHERE id =".$_POST['dev'].";");
$row=$res->fetch_assoc();
$dirname=$row['name'];

$dir="/server_minipc/".$dirname."/";
$dh = opendir($dir);
while (($file = readdir($dh)) !== false) {
unlink("/server_minipc/".$dirname."/".$file);	
echo "Deleted "."/var/www/minipc/".$dirname."/".$file."<br>";
	}

$id = $_POST['pl'];
$playlist = $client->playlist->get($id, $version);
$ids=explode(",", $playlist->playlistContent);

foreach ($ids as $kay => $value) {
	$fopen=fopen("/server_minipc/".$dirname."/".$kay.".mp4", "w+");
	$entry = $client->media->get($value, $version);
//$file = file_get_contents ($entry->downloadUrl);	
//echo $entry->downloadUrl."\n";
if(!fwrite($fopen,file_get_contents($entry->downloadUrl))) echo "Write error \n";//download 
fclose($fopen);	

}


//}
//else $res=$mysqli->query("UPDATE `clients` SET audioid = '".$_GET['id']."' WHERE id =".$_SESSION['client'].";");
//echo "UPDATE `clients` SET videoid = '".$_GET['id']."' WHERE id =".$_SESSION['client'].";";
//header('Location: /cl_client_info.php?clientid='.$_SESSION['client']);
//exit;	
//}
header('Location: /cl_panel.php');
?>

</body>
</html>