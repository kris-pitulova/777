<?php
namespace kristina;
use core;
class Line {
	protected $x = [];
	public function __constuct() {
	}
	public function lineRoots($a, $b) {
		if ($a==0){
			return false;
		}
		$this->x[] = -$b/$a;
		return $this->x;
	}
}
?>