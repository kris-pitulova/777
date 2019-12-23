<?php
namespace kristina;
use core;
class Line {
	protected $x = [];
	public function __constuct() {
	}
	public function lineRoots($a, $b) {
		if ($a==0){
			throw new MyException("This is not an equation \n");
		}
	MyLog::log("Linear equation is entered");
		$this->x[] = -$b/$a;
		return $this->x;
	}
}
?>