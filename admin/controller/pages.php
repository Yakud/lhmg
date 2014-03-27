<?php


if(isset($_GET['save'])){
  foreach($page->Get() as $i => $val)
    if($val[0] == $_GET['id'])
	{
	  //echo $menu->Get(array($i, 3));
          $page->Set(array($i, 1), $_POST['head']);
          $page->Set(array($i, 2), $_POST['head-eng']);
	  $page->Set(array($i, 3), $_POST['url']);
	  $page->Set(array($i, 4), $_POST['text']);
          $page->Set(array($i, 5), $_POST['text-eng']);
	  echo "<span style='color:green;'>Сохранено!</span>";
	  break;
	}
}
if(empty($_GET['id']))
{
  foreach($page->Get() as $i => $val)
    echo "<a href='?event=pages&id=".$val[0]."'>".$val[1]."</a> <br>";
}
else{
  $id = $_GET['id']-1;
?>
<form action="?event=pages&save&id=<?=($id+1)?>" method="post">
<label>Заголовок: </label><br>
<input type="text" size="40" name="head" value="<?=$page->Get(array($id, 1))?>"><br>
<label>Заголовок eng: </label><br>
<input type="text" size="40" name="head-eng" value="<?=$page->Get(array($id, 2))?>"><br>
<label>URL: </label><br>
<input type="text" size="40" name="url"  value="<?=$page->Get(array($id, 3))?>"><br>
Текст: <br>
<textarea name="text" rows="12" cols="80"><?=$page->Get(array($id, 4))?></textarea><br>
Текст eng: <br>
<textarea name="text-eng" rows="12" cols="80"><?=$page->Get(array($id, 5))?></textarea><br>
<input type="submit" value="Сохранить"> 
</form>
<script>
$(function(){
  $('textarea').markItUp(xBbbCodeSet);	
});
</script>
<? }?>