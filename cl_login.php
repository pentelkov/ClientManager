<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>RDS Media enter personal account</title>
</head>
<body>
<img src="logo.png" width=100 border="0" align="right" />
<h1>
<p div="" align="center">Вход в личный кабинет клиент-менеджера RDS Media</p>
</h1>
<?php
session_start();
if($_SESSION['logged']) {
header('Location: /cl_panel.php?type=1');
}
else if($_SESSION['g_logged']){
header('Location: /cl_panel.php');
exit;
}
?>
<a href='http:\\bk.rdsmedia.tv' align='center'>Back to home page</a><p>
<table width="100%" height="90%" border="0" cellspacing="0" cellpadding="5" align=left valign=top>
<tbody> 
 <tr align=CENTER  height="80%" valign=middle > 
  <td>
<?if($_GET['error']==115) echo "Ошибка 115: Неверный логин или пароль."?>
   <form action="action.php" method="post" align="center">
    <p>Login: 
    <input type="text" name="login" />
    <p>Password: 
    <input type="password" name="pass" />
    <p><button formaction="cl_loged.php">OK</button>
   </form>
<a href="google_login.php?mode=2" target="" title = "login with Google" align="center"><Img src= "http://todocamp.com/media/i/google-login-button.png"></a>
  </td>
 <tr height="10%" valign=bottom>
  <td ALIGN=CENTER >
   <hr />
   <h4>
   <p div="" align="center">Copyright &copy; 2013 rdsmedia.tv <span class="Apple-tab-span" style="white-space:pre">	</span>+7(495) 983-01-83 <span class="Apple-tab-span" style="white-space:pre">	</span>info@rdsmedia.tv  <span class="Apple-tab-span" style="white-space:pre">	</span>demo.rdsmedia.tv     </p>
   </h4>
   </td>
 </tr>
</tbody>
</table>

</body>
</html>
