<?php
define('BASEURI', __DIR__);
echo BASEURI;
include BASEURI . "/core/logabstract.php";
include BASEURI . "/core/loginterface.php";
include BASEURI . "/core/equationinterface.php";
include BASEURI . "/kristina/MyException.php";
include BASEURI . "/kristina/mylog.php";
include BASEURI . "/kristina/line.php";
include BASEURI . "/kristina/square.php";


use kristina\MyLog;
use kristina\Square;
use kristina\Line;
use kristina\MyException;

MyLog::log("Current version: " . file_get_contents("version"));
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