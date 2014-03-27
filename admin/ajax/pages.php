<?php
include '../../class/json.php';
/* Подгружаем БД */
include '../../class/db.php';

$page = new Base('../../db/pages.txt');

switch($_GET['event']){
  case 'new': 
    $i  = count($page->Get());

    if(!$t){
      $page->Set(array($i, 0), $_GET['id']);  
	  $page->Set(array($i, 1), "Пустая страница");  
	  $page->Set(array($i, 2), "empty_".$_GET['id']);  
	  $page->Set(array($i, 3), "Пустая страница");  
    }
  break;	
	
  case 'delete': 
    foreach($page->Get() as $i => $val)
	{
	  if($_GET['id'] == $val['0'])
	  {
	    unset($page->objBase[$i]);	
		//$page->save();
		$page->Set(array($i), 'unset');
	  }
	}
  break;	
}