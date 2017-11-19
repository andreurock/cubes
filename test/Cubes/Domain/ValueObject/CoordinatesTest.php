<?php
namespace Cubes\Test\Domain\ValueObject;

use Cubes\Domain\ValueObject\Coordinates;
use PHPUnit\Framework\TestCase;

/**
 * Class CoordinatesTest
 * @package Cubes\Test\Domain\ValueObject
 */
class CoordinatesTest extends TestCase
{
    public function testInstantiateNewCoordinates()
    {
        $x = 6;
        $y = 0;
        $z = -1;
        $coordinates = new Coordinates($x, $y, $z);

        TestCase::assertEquals($x, $coordinates->x());
        TestCase::assertEquals($y, $coordinates->y());
        TestCase::assertEquals($z, $coordinates->z());
    }

    public function testPrintCoordinates()
    {
        $x = 0;
        $y = -3;
        $z = 10;
        $coordinates = new Coordinates($x, $y, $z);

        TestCase::assertEquals("($x,$y,$z)", $coordinates->__toString());
    }
}
