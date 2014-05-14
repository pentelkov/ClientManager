<!DOCTYPE HTML>
<html>
 <head>
  <BASE TARGET="_parent">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>RDS enter personal account</title>
</head>
<body>
<?php session_start();?>
<img src="logo.png" height=120 border="0" align="right" />
<h1>
<p div="" align="center">Панель клиент-менджера RDS</p>
</h1>
<?php 



if ($_GET['type']!=1){
//------------------------------------------------
require_once('/var/simplesamlphp/lib/_autoload.php');

$auth = new SimpleSAML_Auth_Simple('rds-sp');
$auth->requireAuth(array(
	'saml:sp' => 'http://192.168.1.150/simplesaml/module.php/saml/sp/metadata.php/rds-sp',
	'saml:idp' => 'http://80.243.15.5/simplesaml/saml2/idp/metadata.php'
	)
);

$attrs = $auth->getAttributes();
if (!isset($attrs['http://axschema.org/namePerson/first'])) {
    print('displayName attribute missing.<br>');
}
$name = $attrs['http://axschema.org/namePerson/first'][0].' '.$attrs['http://axschema.org/namePerson/last'][0];

if (!$auth->isAuthenticated()) {
    /* Show login link. */
    print('<a href="/login">Login</a>');
}
else {
print('Hello, ' . htmlspecialchars($name));
$url = $auth->getLogoutURL();
print('<br><a href="google_logout.php?mode=2" target="_parent">Logout</a>');
//print('<br>'. htmlspecialchars($url));
}
}
//------------------------------------
else{
echo "Welcome, ".$_SESSION['name']; 
print('<br><a href="cl_logout.php" target="_parent">logout</a>');
}
?>
</body>
</html>
