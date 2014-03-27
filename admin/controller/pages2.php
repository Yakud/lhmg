<?
if(empty($_GET['id'])){
  echo "<table>";
  foreach($page->Get() as $i=>$val){
	 echo "<tr><td><a href=\"?event=pages&id=$val[0]\">$val[1]</a></td><td><a href='#' class='del' title='".$val[0]."'>x</a></td></tr>";
  }
  echo "</table>";
  echo "<input type='button' value='Добавить' class='add btn'>";
?>
<style>
.del{color:green;}
td{
	border:1px solid #CCC;
	padding:5px;
}
</style>
<script>
maxI = <?=count($page->Get())?>;
$(function(){
  $("input.add").click(function(){
	
	$.get("ajax/pages.php", {"event":"new", "id":maxI+1}, function(data){
		maxI++; 
	  $("table").append('<tr><td><a href="?event=pages&id='+maxI+'">Пустая страница</a></td> <td><a href="#" class="del" title="'+maxI+'">x</a></td></tr>'); 
	});
	return false;
  });
  
  $(".del").live('click',function(){
	var t = $(this);
    $.get("ajax/pages.php", {"event":"delete", "id":$(this).attr('title')}, function(data){
	  t.parent().parent().remove();
	});
	return false;
  });
});
</script>  
<?
}
else
{
  $t = false;
  foreach($page->Get() as $i => $val){
    if($val[0] == $_GET['id'])$t = true;
  }
  
  if(!$t){
    $page->Set(array($i+1, 0), $_GET['id']);  
	$page->Set(array($i+1, 1), "Пустая страница");  
	$page->Set(array($i+1, 2), "empty_".$_GET['id']);  
	$page->Set(array($i+1, 3), "Пустая страница");  
  }
  include "pages.php";
}