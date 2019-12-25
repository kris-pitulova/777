<?php
namespace kristina;
use core\logabstract;
use core\LogInterface;
class MyLog extends LogAbstract implements LogInterface{
  public static function write() {
	array_push(self::Instance()->log, '');
	self::Instance()->_write();
  }
  
  public static function log($str) {
     MyLog::Instance()->log[] = $str;
  }
  
  public function _write() {
	$logName = new \DateTime(); 
    $logName = $logName->format('d.m.Y_H,i,s') . ".log"; 
 	 
 	if(!is_dir(BASEURI . "/Log")) { 
 		mkdir(BASEURI . "/Log"); 
 	} 
 	 
    file_put_contents(BASEURI . "/Log/" . $logName, implode("\r\n", self::Instance()->log)); 
    print_r(implode("\n", self::Instance()->log)); 

  }
}

?>