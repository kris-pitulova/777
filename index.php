<?php
class Line {
	protected $x;
	public function __constuct($x = null) {
		$this->x = $x;
	}
	public function lineRoots($a, $b) {
		$this->x = -$b/$a;
		return $this->x;
	}
}
	
class Square extends Line{
	public function __construct($obj1, $x = null) {
		$this->obj1 = $obj1;
	}
	protected $obj1;
	
	protected function discriminant($a, $b, $c) {
		return pow($b, 2)-4*$a*$c;
	}
	
	public function squareRoots($a, $b, $c) {
		$disc = $this->discriminant($a, $b, $c);
		if ($disc>0) {
			$this->x = Array();
			$x1 = (-$b+sqrt($disc))/(2*$a);
			$x2 = (-$b-sqrt($disc))/(2*$a);
			array_push($this->x, $x1, $x2);
		}
	    if ($disc==0) {
			$this->x = -$b/(2*$a);
		}
		return $this->x;
	}
}
	
class ClassC extends square {
	public function __construct($obj1, $obj2) {
		parent::__construct($obj1);
		$this->obj2 = $obj2;
	}
	protected $obj2;
}
$f = new Line();
echo $f->lineRoots(2, 4);

$d = new Square(null);
var_dump($d->squareRoots(1, -2, -3)); 

?>