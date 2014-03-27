<?php
session_start();
include "class/json.php";
include "class/db.php";
include 'class/bbcode/bbcode.lib.php';
include "lang.php";
include "settings.php";

if(isset($_GET['lang']) && $_COOKIE['lang'] != $_GET['lang']) {
    setcookie("lang",$_GET['lang'],time()+36000000);
    header("Location: ?lang={$_GET['lang']}");
    exit;
}

if(isset($_COOKIE['lang']))
    $lang = $_COOKIE['lang'] == 'en'; //0 - ru, 1 - en
else
    $lang = 0;

$lang_text = $lang_text[$lang == 1 ? 'en' : 'ru'];


$menu = new Base('db/menu.txt');
$page = new Base('db/pages.txt');
$designe = new Base('db/designe.txt');
$event = $_GET['route'];

if($event == "")
  $event = $page->Get(array(0, 3));
  
$text = "";
$head = "IШаблон";
foreach($page->Get() as $i => $val)
  if($val[3] == $event)
  {
    $text = $val[4+$lang];
    $head = $val[1+$lang];
  }
$text = ($text == "")?"404":$text;

$page_event = 0;
foreach($menu->Get() as $i => $val)
  if($val[3] == $event)
  {
    $page_event = $val[3];
  }

// если была нажата кнопка "Отправить" 
$mail_to = FALSE;

if($_POST['submit'] && $_POST['event']=='mail' && strlen($_POST['mess'])) { 
        // $_POST['title'] содержит данные из поля "Тема", trim() - убираем все лишние пробелы и переносы строк, htmlspecialchars() - преобразует специальные символы в HTML сущности, будем считать для того, чтобы простейшие попытки взломать наш сайт обломались, ну и  substr($_POST['title'], 0, 1000) - урезаем текст до 1000 символов. Для переменной $_POST['mess'] все аналогично 
        $title = substr(htmlspecialchars(trim($_POST['title'])), 0, 1000); 
        $mess =  substr(htmlspecialchars(trim($_POST['mess'])), 0, 1000000); 
        // $to - кому отправляем 
        $to = $settings['mail_admin']; 
        // $from - от кого 
        $from='test@test.ru'; 
        // функция, которая отправляет наше письмо. 
        mail($to, $title, $mess, 'From:'.$from); 
        $mail_to = TRUE;

} 

?>
<!DOCTYPE HTML>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?=$head?></title>
  <script src="js/jquery-1.7.2.min.js"></script>
  <script src="js/slimbox2.js"></script>
  <script src="js/slimbox2-autosize.js"></script>

  <link href="css/slimbox2-autosize.css" rel="stylesheet" />
  <link href="style.css" rel="stylesheet" type="text/css">
<?
echo "<style>";
$old_selector = "";
foreach($designe->Get(array("key")) as $i => $val){
  $key = $designe->Get(array("key", $i));
  $value = $designe->Get(array("value", $i));
  $selector = $designe->Get(array("selector", $i));
  
  if($old_selector != $selector) echo $selector."{";
 
  echo "$key:$value;";
  
  if($old_selector != $selector)
  {
	echo "}";  
	$old_selector = $selector;
  }
}
echo "</style>";
?>
</head>

<body>
<div id="main" class="curled">

  <div id="header">
    <img src="http://lhmg.ru/logo.png">
  </div>
    <div style="position: absolute; margin-left: 770px;">
        <? if($lang == 1): ?>
            <a href="?lang=ru"><img src="images/flag_russia.png" border="0" class="circle"></a>
        <? endif?>
            
        <? if($lang == 0): ?>
            <a href="?lang=en"><img src="images/flag_usa.png" border="0" class="circle"></a>
        <? endif?>
    </div>
    
  <div id="main-content">
    <table>
    <tr><td>
    <div id="menu">
      <? /* Меню сайта */ ?>
      <? foreach($menu->Get() as $i => $val):?>
        <a href="<?=$val[2]?>"><li <?=($event == $val[2])?"class='active'":""?>><?=$val[$lang]?></li></a>
      <? endforeach;?>
    </div> 
 	</td>
    <td>
    <div id="content">
      <?
        echo $mail_to==TRUE ? "<p>{$lang_text['letter_send']}</p>" : "";
        
        $bb = new bbcode($text);
        echo $bb -> get_html();

        if($event=="mail"){ ?>
          <form action="/mail" method=post> 
            <div > 
            <?=$lang_text['theme']?><br /> 
            <input type="text" name="title" size="40"><br /> 
            <?=$lang_text['message']?><br /> 
            <textarea name="mess" rows="10" cols="40"></textarea> 
            <br /> 
            <input type="hidden" value="mail" name="event">
            <input type="submit" value="Отправить" name="submit">
            </div> 
        </form>  
        <?}
        if($event=="contacts")include "mail.php";
        if($event=="gallery")include "gallery.php";
        
      ?>
    </div>
    </td></tr>
    </table>
  </div>
  
  <div id="footer">
  Станислав Дрёмов & Алексей Киселев &copy;  2012
  </div>
  
</div>
</body>
</html>