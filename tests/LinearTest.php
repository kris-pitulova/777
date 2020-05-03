<?php
namespace kristina;

use PHPUnit\Framework\TestCase;
include __DIR__ . "/../core/logabstract.php";
include __DIR__ . "/../core/loginterface.php";
include __DIR__ . "/../core/equationinterface.php";
include __DIR__ . "/../kristina/myexception.php";
include __DIR__ . "/../ktistina/log.php";
include __DIR__ . "/../ktistina/linear.php";

final class LinearTest extends TestCase
{
    /**
    * @dataProvider providerLinearSolve
    */
    public function testLinearSolve($k, $b, $x) {
      $inst = new Linear();
      $this->assertEquals($x, $inst->linearSolve($k, $b));
    }

    public function providerLinearSolve() {
      return array(
            array(4, -12, [3]),
            array(-0.5, 10.5, [21])
      );
    }

    /**
    * @dataProvider providerLinearSolveException
    * @expectedException myexception
    */
    public function testLinearSolveException($k, $b) {
      $inst = new Linear();
      $inst->linearSolve($k, $b);
    }

    public function providerLinearSolveException() {
      return array(
            array('S', 1),
            array(0, 1),
            array(1, 'S')
      );
    }
}
