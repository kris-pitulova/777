<?php
include "core/logabstract.php";
include "core/loginterface.php";
include "core/equationinterface.php";
include "kristina/mylog.php";
include "kristina/line.php";
include "kristina/square.php";


use kristina\MyLog;
use kristina\Square;
use kristina\Line;
$q = new Square();
echo $q->solve(10, 2, 7);
?>