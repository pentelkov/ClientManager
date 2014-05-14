<!DOCTYPE HTML>
<html>
 <head>
  <BASE TARGET="_parent">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>RDS enter personal account</title>
</head>
<body>
<h2>Выберите локацию и устройство</h2> 
<?

session_start();
$mysqli = new mysqli("80.243.15.51","qwe","123", "RDSDB");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
$mysqli->set_charset("unicode");
?>
  <form action="cl_take_d.php" method="post">   
   <p><select name="cl" required >
    <option disabled selected>Выберите локацию</option>
    <?
    $res=$mysqli->query("SELECT * FROM locations;");
    $row=$res->fetch_assoc();
    while($row!=false) {
    	echo "<option value=\"".$row['id']."\">".$row['name']."</option>";
    $row=$res->fetch_assoc();    
    }
    ?>
   </select></p>
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
   <p><input type="submit" value="Назначить"></p>
  </form>
</body>
</html>