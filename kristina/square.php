<?php
namespace kristina;
use core\EquationInterface;
class Square extends Line implements EquationInterface{
	public function __construct() {
	}
	
	protected function discriminant($a, $b, $c) {
		return pow($b, 2)-4*$a*$c;
	}
	
	public function solve($a, $b, $c) {
		if ($a==0){
			return $this->lineRoots;
		}
		$disc = $this->discriminant($a, $b, $c);
		if ($disc<0){
			return false;
		}
		if ($disc>0) {
			$x1 = (-$b+sqrt($disc))/(2*$a);
			$x2 = (-$b-sqrt($disc))/(2*$a);
			array_push($this->x, $x1, $x2);
		}
	    if ($disc==0) {
			$this->x[] = -$b/(2*$a);
		}
		return $this->x;
	}
}
?>