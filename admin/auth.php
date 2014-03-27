<? if(empty($_GET['event'])){?>
<div style="margin:0 auto;">
<form action="?event=enter" method="post">
<table>
  <tr><td>Логин:</td><td><input type="text" name="login"></td></tr>
  <tr><td>Пароль:</td><td><input type="password" name="password"></td></tr>
</table>
<input type="submit" value="Войти">
</form>
</div>
<?
}
else{

  if($_POST["login"] == $login && sha1($_POST["password"]) == $password)
  {
    setcookie("auth", $sekret_key); 
	$_SESSION["auth"] = $sekret_key;
	header("Location:?");
  }
}