<?php
define("BASEURI", __DIR__);
date_default_timezone_set("Europe/Moscow");

include BASEURI . "/core/logabstract.php";
include BASEURI . "/core/loginterface.php";
include BASEURI . "/core/equationinterface.php";
include BASEURI . "/kristina/MyException.php";
include BASEURI . "/kristina/mylog.php";
include BASEURI . "/kristina/linear.php";
include BASEURI . "/kristina/square.php";

use kristina\Mylog;
use kristina\square;
use kristina\linear;
use kristina\MyException;


$version = trim(shell_exec('git symbolic-ref --short -q HEAD'));
MyLog::log('Current version: ' . $version);

echo "Enter koefs a, b, c \n";

for($i = 0; $i < 3; $i ++) {
	$kfArray[$i] =  (float)readline();
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
		Log::log("This equation has 2 roots: " . $roots[0] . ", " . $roots[1] . "\n");
	} elseif(count($roots) == 1) {
		Log::log("Equation root " . $roots[0] . "\n");
	}

} catch(MyException $ex) {
	MyLog::log($ex->getMessage() . "\n");
}
MyLog::write();

?>
