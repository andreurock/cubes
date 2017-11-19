<?php
namespace Cubes\Test\Domain\Entity\Cube;

require_once __DIR__ . '/../EntityTest.php';

use Cubes\Domain\Entity\Cube\Cube;
use Cubes\Domain\Entity\Cube\EdgesSizesNotValidException;
use Cubes\Test\Domain\Entity\EntityTest;
use PHPUnit\Framework\TestCase;

/**
 * Class CubeTest
 * @package Cubes\Domain\Entity\Cube
 */
class CubeTest extends EntityTest
{
    public function testBuildNewCube()
    {
        $position = $this->createCoordinatesMock(3, 4, 3);

        $edgeSize = 5;
        $cube = Cube::build($position, $edgeSize);

        TestCase::assertInstanceOf(Cube::class, $cube);
        TestCase::assertEquals($position, $cube->position());
        TestCase::assertEquals($edgeSize, $cube->edgeSize());
    }

    public function testBuildNewCubeFailsIfEdgeSizeIsZero()
    {
        $position = $this->createCoordinatesMock(3, 4, 3);
        $edgeSize = 0;

        $this->expectException(EdgesSizesNotValidException::class);
        Cube::build($position, $edgeSize);
    }

    public function testBuildNewCubeFailsIfEdgeSizeIsNegative()
    {
        $position = $this->createCoordinatesMock(3, 4, 3);
        $edgeSize = -1;

        $this->expectException(EdgesSizesNotValidException::class);
        Cube::build($position, $edgeSize);
    }

    public function testCalculateVolumeOfCube()
    {
        $position = $this->createCoordinatesMock(7, 8, 2);
        $edgeSize = 4;

        $cube = Cube::build($position, $edgeSize);

        TestCase::assertEquals(pow($edgeSize, 3), $cube->calculateVolume());
    }
}
