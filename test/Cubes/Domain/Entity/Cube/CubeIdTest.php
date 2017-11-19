<?php
namespace Cubes\Test\Domain\Entity\Cube;

use Cubes\Domain\Entity\Cube\CubeId;
use PHPUnit\Framework\TestCase;

/**
 * Class CubeIdTest
 * @package Cubes\Test\Domain\Entity\Cube
 */
class CubeIdTest extends TestCase
{
    public function testGenerateNewCubeId()
    {
        $cubeId = new CubeId();

        TestCase::assertNotEmpty($cubeId->id());
        TestCase::assertEquals($cubeId->id(), $cubeId->__toString());
    }

    public function testGenerateNewCubeIdWithExistingId()
    {
        $id = "this-is-my-id";
        $cubeId = new CubeId($id);

        TestCase::assertEquals($id, $cubeId->id());
    }

    public function testTwoDifferentCubeIdAreNotEquals()
    {
        $cubeId1 = new CubeId();
        $cubeId2 = new CubeId();

        TestCase::assertFalse($cubeId1->equals($cubeId2));
        TestCase::assertTrue($cubeId1->equals($cubeId1));
    }
}
