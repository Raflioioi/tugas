<?php
	function defineget($key){
		$value;
		if(!isset($_GET[$key])){
			$value="undefined";
		}elseif ($_GET[$key]=="") {
			$value="kosong";
		}else{
			$value=$_GET[$key];
		}
		return $value;
	}
?>

