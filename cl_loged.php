<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>RIMHD-TV enter personal account</title>
</head>
<body>
<?php
$_POST[login]=strtolower($_POST[login]);

$mysqli = new mysqli("80.243.15.5","user","pass", "idp_db");

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
$mysqli->set_charset("unicode");
$res=$mysqli->query("SELECT * FROM users WHERE u_login = '".$_POST[login]."';");
$row=$res->fetch_assoc();

if($row[u_login]==$_POST[login] && $row[u_pass]==$_POST[pass] && ($row[u_role]=="admin" || $row[u_role]=="client_man"))
{
session_start();
$_SESSION['name']=$row[u_login];
$_SESSION['logged']=true;
header('Location: /cl_panel.php?type=1');
exit;
}
else if ($row[u_role]=="content_man"){
header('Location: /cl_login.php?error=116');
}
else {
header('Location: /cl_login.php?error=115');
exit;
}
?>
</body>
</html> 
