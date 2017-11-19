<?php
namespace Cubes\Test\Domain\Entity\CubeIntersection;

use Cubes\Domain\Entity\Cube\Cube;
use Cubes\Domain\Entity\CubeIntersection\CubeIntersection;
use Cubes\Domain\Entity\CubeIntersection\GeometricFigureIsNotACubeException;
use Cubes\Domain\Entity\CubeIntersection\NotIntersectionException;
use Cubes\Domain\Entity\Cuboid\Cuboid;
use Cubes\Domain\ValueObject\Coordinates;
use PHPUnit\Framework\TestCase;

/**
 * Class CubeIntersectionTest
 * @package Cubes\Test\Domain\Entity\CubeIntersection
 */
class CubeIntersectionTest extends TestCase
{
    public function testIntersectTwoCubes()
    {
        $coordinates1 = new Coordinates(0, 0, 0);
        $edgeSize1 = 5;
        $cube1 = Cube::build($coordinates1, $edgeSize1);

        $coordinates2 = new Coordinates(0, -3, 0);
        $edgeSize2 = 5;
        $cube2 = Cube::build($coordinates2, $edgeSize2);

        $intersection = CubeIntersection::intersect($cube1, $cube2);
        TestCase::assertEquals(0, $intersection->position()->x());
        TestCase::assertEquals(0, $intersection->position()->y());
        TestCase::assertEquals(0, $intersection->position()->z());
        TestCase::assertEquals(5, $intersection->width());
        TestCase::assertEquals(2, $intersection->height());
        TestCase::assertEquals(5, $intersection->depth());
    }

    public function testIntersectTwoLargeCubes()
    {
        $coordinates1 = new Coordinates(0, 0, 0);
        $edgeSize1 = 10;
        $cube1 = Cube::build($coordinates1, $edgeSize1);

        $coordinates2 = new Coordinates(3, 2, 0);
        $edgeSize2 = 8;
        $cube2 = Cube::build($coordinates2, $edgeSize2);

        $intersection = CubeIntersection::intersect($cube1, $cube2);
        TestCase::assertEquals(3, $intersection->position()->x());
        TestCase::assertEquals(2, $intersection->position()->y());
        TestCase::assertEquals(0, $intersection->position()->z());
        TestCase::assertEquals(7, $intersection->width());
        TestCase::assertEquals(8, $intersection->height());
        TestCase::assertEquals(8, $intersection->depth());
    }

    public function testCubesNotIntersecting()
    {
        $coordinates1 = new Coordinates(0, 0, 0);
        $edgeSize1 = 5;
        $cube1 = Cube::build($coordinates1, $edgeSize1);

        $coordinates2 = new Coordinates(6, 7, 6);
        $edgeSize2 = 2;
        $cube2 = Cube::build($coordinates2, $edgeSize2);

        $this->expectException(NotIntersectionException::class);
        CubeIntersection::intersect($cube1, $cube2);
    }

    public function testGeometricFiguresAreNotCubes()
    {
        $coordinates1 = new Coordinates(0, 0, 0);
        $cube1 = Cuboid::build($coordinates1, 1, 1, 1);

        $coordinates2 = new Coordinates(6, 7, 6);
        $cube2 = Cube::build($coordinates2, 2);

        $this->expectException(GeometricFigureIsNotACubeException::class);
        CubeIntersection::intersect($cube1, $cube2);
    }
}
