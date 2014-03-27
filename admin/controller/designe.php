<?php
if(isset($_GET['save']))
{
  $designe->objBase = array('key'=>array(), 'value'=>array(), 'selector'=>array());
	
  foreach($_POST['key'] as $i => $val){
    $designe->Set(array("key", $i), $_POST['key'][$i]);
	$designe->Set(array("value", $i), $_POST['val'][$i]);
	$designe->Set(array("selector", $i), $_POST['selector'][$i]);
  }
  echo "<span style='color:green;'>Сохранено!</span>";
}
?>
<form action="?event=designe&save" method="post">
 <table id='table'> 
   <tr><td>Селектор</td><td>Ключ</td><td>Значение</td></tr>
 <? 
 //print_r($designe->Get()); 
 foreach($designe->Get(array("key")) as $i => $val):?>
   <tr>
     <td><input type="text" name="selector[<?=$i?>]" value="<?=$designe->Get(array("selector", $i))?>"></td>
     <td><input type="text" name="key[<?=$i?>]" value="<?=$designe->Get(array("key", $i))?>"></td>
     <td><input type="text" name="val[<?=$i?>]" value="<?=$designe->Get(array("value", $i))?>"></td>
     <td><input type='button' class='delete' title='<?=$i?>' value='x'></td>
   </tr>
 <? endforeach?>
 </table>
 <input type="submit" value="Сохранить"><input id="add" type="button" value="Добавить">
</form>	
<script type="text/javascript">
var maxI = <?=count($designe->Get())?>;

$(function(){
  $("#add").click(function(){
	  maxI++;
    $("#table").append('<tr>'+
	'<td><input type="text" name="selector['+maxI+']" ></td>'+
    '<td><input type="text" name="key['+maxI+']" ></td>'+
	'<td><input type="text" name="val['+maxI+']" ></td>'+
	'<td><input type="button" class="delete" title="'+maxI+'" value="x"></td>'+
    '</tr>');
  });
  
  $(".delete").live("click", function(){
    $(this).parent().parent().remove();
  });
});

</script>
<? 

