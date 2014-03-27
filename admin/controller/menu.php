
<?
if(isset($_GET['save']))
	{
	  $menu->Clear();
	  foreach($_POST['menu'] as $i=>$val)
	    $menu->Set(array($i, 0), $val);
		
          foreach($_POST['menu-eng'] as $i=>$val)
	    $menu->Set(array($i, 1), $val);
          
	  foreach($_POST['href'] as $i=>$val)
	    $menu->Set(array($i, 2), $val);
          
	  if(count($_POST['mail']))
	  foreach($_POST['mail'] as $i=>$val)
	    $menu->Set(array($i, 3), $val=='on'?'1':'0');
	  
	  echo "<span style='color:green;'>Сохранено!</span>";
	}
	
    echo "<form  action='?event=menu&save=1' method='post'>"; 
	?>
<table id='form'>
  <tr><td>Текст</td><td>Текст eng</td><td>Ссылка</td><td>Mail</td></tr>
    <?
    foreach($menu->Get() as $i => $val)
	  echo "<tr class='t-".$i."'><td><input type='text' name='menu[".$i."]' value='".$val[0]."'></td>".
                    "<td><input type='text' name='menu-eng[".$i."]' value='".$val[1]."'></td>".
                    "<td><input type='text' name='href[".$i."]' value='".$val[2]."'></td>".
                    "<td><input type='checkbox' name='mail[".$i."]' class='chk' ".($val[3]=="1" ? "checked":"")."></td>".
                    "<td><input type='button' class='delete btn' title='".$i."' value='x'></td>".
                    "</tr>";	
	?>
</table>
    <?
	echo "<input type='submit' value='Сохранить' class='btn' style='margin-left:3px;margin-right:5px;'>"; 
	echo "<input id='add-menu' type='button' value='Добавить' class='btn'>"; 
	echo "</form>";
?>
<style>
.chk{
  border:1px solid #999;
  width:21px;
  height:21px;
}
</style>
<script>
maxI = <?=count($menu->Get())?>;

$("#add-menu").click(function(){
  $("#form").append("<tr class='t-"+maxI+"'><td>"+
	  "<input type='text' name='menu["+maxI+"]' value=''></td>"+
          "<td><input type='text' name='menu-eng["+maxI+"]' value=''></td>"+
	  "<td><input type='text' name='href["+maxI+"]' value=''></td>"+
	  "<td><input type='checkbox' name='mail["+maxI+"]' class='chk'></td>"+
	  "<td><input type='button' class='delete btn' title='"+maxI+"' value='x'></td></tr>");	
  maxI++;
});

$(".delete").live("click", function(){
  $(this).parent().parent().remove();
});

/*function getElementByClassName(className){
  var e = document.getElementsByTagName("*");
  for(var i = 0; i < e.length; i ++){	
    if(e[i].className == className) return e[i];
  }
}

document.getElementById("add-menu").onclick = function(){
  var form = document.getElementById("form");
  form.innerHTML = form.innerHTML+
    "<tr class='t-"+maxI+"'><td>"+
	  "<input type='text' name='menu["+maxI+"]' value=''></td>"+
	  "<td><input type='text' name='href["+maxI+"]' value=''></td>"+
	  "<td><input type='button' class='delete btn' title='"+maxI+"' value='x'></td></tr>";
  maxI++;
  setEvent();
  return 0;
}

function setEvent(){
  del = document.getElementsByTagName('input');
  for(var i = 0; i < del.length; i ++){	
    d = del[i];
    if(d.className == "delete")
    {
      d.onclick = function(){
		//removeChild();
		//alert(this.parentNode.parentNode)
		g = this.parentNode.parentNode;
		g.parentNode.removeChild(g);
		
	    //r = getElementByClassName("t-"+this.title);
	    //r.innerHTML = "";
  	  };
    }
  }
}

setEvent();
//document.getElementsByClassName("delete");

/*for(del in i){
  del[i].onClick = function(){
    alert(this)
    return 0;	
  }
}*/
</script>