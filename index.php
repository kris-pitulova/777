<?php
class ClassA {
	
}
	
class ClassB {
	public function __construct($obj1) {
		$this->obj1 = $obj1;
	}
	protected $obj1;
}
	
class ClassC extends ClassB {
	public function __construct($obj1, $obj2) {
		parent::__construct($obj1);
		$this->obj2 = $obj2;
	}
	protected $obj2;
}

$obj1 = new ClassA();
$obj3 = new ClassB($obj1);
$obj4 = new ClassB($obj3);
$obj5 = new ClassB($obj4);
$obj2 = new ClassC($obj1, $obj5);
?>