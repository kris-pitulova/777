<?php
include "core/logabstract.php";
include "core/loginterface.php";
include "core/equationinterface.php";
include "kristina/MyException.php";
include "kristina/mylog.php";
include "kristina/line.php";
include "kristina/square.php";


use kristina\MyLog;
use kristina\Square;
use kristina\Line;
use kristina\MyException;

echo "Enter koef a, b, c \n";
for($i = 0; $i < 3; $i ++) {
	fscanf(STDIN, "%d\n", $number);
	$kfArray[$i] =  $number;
}
$a = $kfArray[0];
$b = $kfArray[1];
$c = $kfArray[2];
$eq = $a . "x^2 + " . $b . "x + " . $c . " = 0";
MyLog::log("Entered equation: " . $eq);
try {
	$equation = new Square();
	$roots = $equation->solve($a, $b, $c);
	
	if(count($roots) == 2) {
		MyLog::log("This equation has 2 roots: " . $roots[0] . ", " . $roots[1] . "\n");
	} elseif(count($roots) == 1) {
		MyLog::log("Equation root " . $roots[0] . "\n");
	}
	
} catch(MyException $ex) {
	MyLog::log($ex->getMessage() . "\n");
}
MyLog::write();

?>