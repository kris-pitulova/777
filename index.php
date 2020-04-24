<?php
define("BASEURI", __DIR__);
date_default_timezone_set("Europe/Moscow");

include BASEURI . "/core/LogAbstract.php";
include BASEURI . "/core/LogInterface.php";
include BASEURI . "/core/EquationInterface.php";
include BASEURI . "/Dadi/MyException.php";
include BASEURI . "/Dadi/Log.php";
include BASEURI . "/Dadi/Linear.php";
include BASEURI . "/Dadi/Square.php";

use Dadi\Log;
use Dadi\Square;
use Dadi\Linear;
use Dadi\MyException;


$version = trim(shell_exec('git symbolic-ref --short -q HEAD'));
Log::log('Current version: ' . $version);

echo "Enter koefs a, b, c \n";

for($i = 0; $i < 3; $i ++) {
	$kfArray[$i] =  (float)readline();
}

$a = $kfArray[0];
$b = $kfArray[1];
$c = $kfArray[2];

$eq = $a . "x^2 + " . $b . "x + " . $c . " = 0";
Log::log("Entered equation: " . $eq);

try {
	$equation = new Square();
	$roots = $equation->solve($a, $b, $c);

	if(count($roots) == 2) {
		Log::log("This equation has 2 roots: " . $roots[0] . ", " . $roots[1] . "\n");
	} elseif(count($roots) == 1) {
		Log::log("Equation root " . $roots[0] . "\n");
	}

} catch(MyException $ex) {
	Log::log($ex->getMessage() . "\n");
}
Log::write();

?>
