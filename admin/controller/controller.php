<?php
$menuItem = "<include type='text' value=''>";

?>
<style>a{color:#06C; text-decoration:none;} a:hover{text-decoration:underline;}</style>
<div><a href="?event=menu">Меню</a> :: <a href="?event=pages">Страницы</a> <!--:: <a href="?event=designe">Дизайн</a>--></div><hr>
<?

switch($event){
  case "menu":
    include "menu.php";
  break;	
  
  case "pages":
    include "pages2.php";
  break;
  
  /*case "designe":
    include "designe.php";
  break;*/
}