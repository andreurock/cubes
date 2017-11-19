<?php
namespace Cubes\Test\Domain\Entity\Cuboid;

require_once __DIR__ . '/../EntityTest.php';

use Cubes\Domain\Entity\Cuboid\Cuboid;
use Cubes\Domain\Entity\Cuboid\DepthNotValidException;
use Cubes\Domain\Entity\Cuboid\HeightNotValidException;
use Cubes\Domain\Entity\Cuboid\WidthNotValidException;
use Cubes\Test\Domain\Entity\EntityTest;
use PHPUnit\Framework\TestCase;

/**
 * Class CuboidTest
 * @package Cubes\Test\Domain\Entity\Cuboid
 */
class CuboidTest extends EntityTest
{
    public function testBuildNewCuboid()
    {
        $position = $this->createCoordinatesMock(0, 0, 1);
        $width = 3;
        $height = 1;
        $depth = 6;

        $cuboid = Cuboid::build($position, $width, $height, $depth);

        TestCase::assertInstanceOf(Cuboid::class, $cuboid);
        TestCase::assertEquals($position, $cuboid->position());
        TestCase::assertEquals($width, $cuboid->width());
        TestCase::assertEquals($height, $cuboid->height());
        TestCase::assertEquals($depth, $cuboid->depth());
    }

    public function testBuildNewCuboidFailsIfWidthSizeIsZero()
    {
        $position = $this->createCoordinatesMock(0, 0, 1);
        $width = 0;
        $height = 1;
        $depth = 6;

        $this->expectException(WidthNotValidException::class);
        Cuboid::build($position, $width, $height, $depth);
    }

    public function testBuildNewCuboidFailsIfWidthSizeIsNegative()
    {
        $position = $this->createCoordinatesMock(0, 0, 1);
        $width = -2;
        $height = 1;
        $depth = 6;

        $this->expectException(WidthNotValidException::class);
        Cuboid::build($position, $width, $height, $depth);
    }

    public function testBuildNewCuboidFailsIfHeightSizeIsZero()
    {
        $position = $this->createCoordinatesMock(0, 0, 1);
        $width = 3;
        $height = 0;
        $depth = 6;

        $this->expectException(HeightNotValidException::class);
        Cuboid::build($position, $width, $height, $depth);
    }

    public function testBuildNewCuboidFailsIfHeightSizeIsNegative()
    {
        $position = $this->createCoordinatesMock(0, 0, 1);
        $width = 2;
        $height = -1;
        $depth = 6;

        $this->expectException(HeightNotValidException::class);
        Cuboid::build($position, $width, $height, $depth);
    }

    public function testBuildNewCuboidFailsIfDepthSizeIsZero()
    {
        $position = $this->createCoordinatesMock(0, 0, 1);
        $width = 3;
        $height = 5;
        $depth = 0;

        $this->expectException(DepthNotValidException::class);
        Cuboid::build($position, $width, $height, $depth);
    }

    public function testBuildNewCuboidFailsIfDepthSizeIsNegative()
    {
        $position = $this->createCoordinatesMock(0, 0, 1);
        $width = 2;
        $height = 1;
        $depth = -6;

        $this->expectException(DepthNotValidException::class);
        Cuboid::build($position, $width, $height, $depth);
    }

    public function testCalculateVolumeOfCuboid()
    {
        $position = $this->createCoordinatesMock(7, 8, 2);
        $width = 2;
        $height = 3;
        $depth = 6;

        $cuboid = Cuboid::build($position, $width, $height, $depth);

        TestCase::assertEquals($width * $height * $depth, $cuboid->calculateVolume());
    }
}