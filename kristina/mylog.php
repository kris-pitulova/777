<?php
namespace kristina;
use core\logabstract;
use core\LogInterface;
class MyLog extends LogAbstract implements LogInterface{
public static function write() {
	return MyLog::Instance()->_write();
  }
  public static function log($str) {
    self::Instance()->log[] = $str;
  }
  public function _write() {
	echo implode("\n", MyLog::Instance()->log);
  }
}

?>