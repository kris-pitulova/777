<?php
namespace Dadi;

use PHPUnit\Framework\TestCase;
include __DIR__ . "/../core/LogAbstract.php";
include __DIR__ . "/../core/LogInterface.php";
include __DIR__ . "/../core/EquationInterface.php";
include __DIR__ . "/../Dadi/MyException.php";
include __DIR__ . "/../Dadi/Log.php";
include __DIR__ . "/../Dadi/Linear.php";

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
    * @expectedException MyException
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
