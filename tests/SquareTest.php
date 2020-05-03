<?php
namespace Dadi;

use PHPUnit\Framework\TestCase;
/*include __DIR__ . "/../core/logabstract.php";
include __DIR__ . "/../core/loginterface.php";
include __DIR__ . "/../core/equationinterface.php";
include __DIR__ . "/../kristina/MyException.php";
include __DIR__ . "/../kristina/mylog.php";
include __DIR__ . "/../kristina/linear.php";*/
include __DIR__ . "/../kristina/square.php";

final class SquareTest extends TestCase
{
    /**
    * @dataProvider providerSolve
    */
    public function testSolve($a, $b, $c, $x) {
      $inst = new Square();
      $this->assertEquals($x, $inst->solve($a, $b, $c));
    }

    public function providerSolve() {
      return array(
          array(2, 5,-7, [1, -3.5]),
          array(16, -8, 1, [0.25])
      );
    }
    /**
    * @dataProvider providerSolveException
    * @expectedException MyException
    */
    public function testSolveException($a, $b, $c) {
      $inst = new Square();
      $inst->solve($a, $b, $c);
    }

    public function providerSolveException() {
      return array(
            array(0, 0, 0),
            array(0, 0, 3),
            array(2, null, 1),
            array(1, 3, 'S'),
            array(9, -6, 2)
      );
    }

}
