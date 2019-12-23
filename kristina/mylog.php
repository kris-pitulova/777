<?php
namespace kristina;
use core\EquationInterface;
use core\LogInterface;
class MyLog extends LogAbstract implements LogInterface{
	public static function log($str){
		Log::Instance()->log[] = $str;
	}
	public static function write(){
	
	}
	public function _write(){
		echo implode("\n", Log::Instance()->log);
	}
	
}

?>