<?php
namespace Cubes\Test\Domain\Entity;

use Cubes\Domain\ValueObject\Coordinates;
use PHPUnit\Framework\TestCase;

/**
 * Class EntityTest
 * @package Cubes\Test\Domain\Entity
 */
class EntityTest extends TestCase
{
    protected function createCoordinatesMock($x, $y, $z)
    {
        $position = $this->getMockBuilder(Coordinates::class)
            ->disableOriginalConstructor()
            ->setMethods(['x', 'y', 'z'])
            ->getMock();

        $position->expects(TestCase::any())
            ->method('x')
            ->willReturn($x);
        $position->expects(TestCase::any())
            ->method('x')
            ->willReturn($y);
        $position->expects(TestCase::any())
            ->method('x')
            ->willReturn($z);

        return $position;
    }
}
