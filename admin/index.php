<?php
include '../class/json.php';
/* Подгружаем БД */
include '../class/db.php';

$menu = new Base('../db/menu.txt');
$page = new Base('../db/pages.txt');
$designe = new Base('../db/designe.txt');

$sekret_key = md5("hello_world");
$auth = $_SESSION['auth'] || $_COOKIE['auth']==$sekret_key;

$login = "admin";
$password = "62e430d4bcef30f9e0a5b7a9f4a879a74d2e8151";

$event = $_GET['event'];


if($auth){
?>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="../js/markitup/jquery.markitup.js"></script>
<script type="text/javascript" src="../js/markitup/sets/xbbcode/set.js"></script>

<link href="../js/markitup/skins/simple/style.css" rel="stylesheet" type="text/css" />
<link href="../js/markitup/sets/xbbcode/style.css" rel="stylesheet" type="text/css" />

<style>
.btn{
  border:1px solid #999; 
  padding-left:20px;
  padding-right:20px;
  background-color:white; 
}
.btn:hover{
  background-color:#EBEBEB; 	
}
</style>

<?
  include "controller/controller.php";
}
else{
  include "auth.php";
}

echo "<style>";
$old_selector = "";
foreach($designe->Get(array("key")) as $i => $val){
  $key = $designe->Get(array("key", $i));
  $value = $designe->Get(array("value", $i));
  $selector = $designe->Get(array("selector", $i));

  if($old_selector != $selector and !empty($selector)) echo $selector."{";
 
  echo "$key:$value;";
  if($old_selector != $selector and !empty($selector))
  {
	echo "}";  
	$old_selector = $selector;
  }
}
echo "</style>";
