<?php
class Base{
  private $strBase;
  public $objBase;
  
  /* Конструктор */
  function __construct($strBase = ""){
	if($strBase != "")
	  $this->openBase($strBase);
  }
  
  /* Парсер базы */
  private function parse(){
	$strBaseText = file_get_contents($this->strBase);
	$this->objBase = JSON::decode($strBaseText);
	return true;
  }
  
  public function save(){
	 return file_put_contents($this->strBase, JSON::encode($this->objBase));
  }
  
  /* Открыть БД */
  public function openBase($strBase = ""){
    if($strBase != "")
	{
      $this->strBase = $strBase;
	  $this->parse();
	  return true;
	}  
	return false;
  }
  
  public function Clear(){
    $this->objBase = array();
  }
  
  /* Возвращаем значение(я) из БД */
  public function Get($arr = array()){
	if(count($arr) > 0)
	  $v = $this->objBase[$arr[0]];
	 else
	   return $this->objBase;

	if(count($arr) > 1)
	  foreach($arr as $i => $val)
	    if($i != 0)
	      $v = $v[$val];
	  
	return $v;
  }
  
  /* Сохраняем значение в базу */
  public function Set($arr = array(), $value){
	$str = '$this->objBase';
	foreach($arr as $i => $val){
		$str .= "[".$val."]";
	}
	
	$value = str_replace("'", "\'", $value);
	
	if($value != 'unset')
      $sss = $str."='".$value."';";
	else
	  $sss = "unset(".$str.");";
	
	//$sss = str_replace("'","\'",$sss);
	//echo $sss;
	eval($sss);
	
	$this->save();
	return true;
  }
  
  /*public function Remove($arr = array()){
   $str = '$this->objBase';
	foreach($arr as $i => $val){
		$str .= "[".$val."]";
	}
    $sss = "unset(".$str.");";
	//echo $sss;
	eval($sss);
  }*/
}