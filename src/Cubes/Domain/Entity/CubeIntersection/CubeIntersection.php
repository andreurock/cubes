<?php
namespace Cubes\Domain\Entity\CubeIntersection;

use Cubes\Domain\Entity\Cube\Cube;
use Cubes\Domain\Entity\Cuboid\Cuboid;
use Cubes\Domain\Entity\GeometricFigure;
use Cubes\Domain\Entity\Intersection;
use Cubes\Domain\ValueObject\Coordinates;

/**
 * Class CubeIntersection
 * @package Cubes\Domain\Entity\CubeIntersection
 */
class CubeIntersection extends Cuboid implements Intersection
{
    /**
     * @param GeometricFigure $cube1
     * @param GeometricFigure $cube2
     * @return Cuboid
     * @throws GeometricFigureIsNotACubeException
     */
    public static function intersect(GeometricFigure $cube1, GeometricFigure $cube2): Cuboid
    {
        if (! $cube1 instanceof Cube || ! $cube2 instanceof Cube) {
            throw new GeometricFigureIsNotACubeException();
        }

        $x = static::calculateIntersectionPoints(
            $cube1->position()->x(),
            $cube1->position()->x() + $cube1->edgeSize(),
            $cube2->position()->x(),
            $cube2->position()->x() + $cube2->edgeSize()
        );

        $y = static::calculateIntersectionPoints(
            $cube1->position()->y(),
            $cube1->position()->y() + $cube1->edgeSize(),
            $cube2->position()->y(),
            $cube2->position()->y() + $cube2->edgeSize()
        );

        $z = static::calculateIntersectionPoints(
            $cube1->position()->z(),
            $cube1->position()->z() + $cube1->edgeSize(),
            $cube2->position()->z(),
            $cube2->position()->z() + $cube2->edgeSize()
        );

        $position = new Coordinates($x[0], $y[0], $z[0]);
        $width = $x[1] - $x[0];
        $height = $y[1] - $y[0];
        $depth = $z[1] - $z[0];

        return static::build($position, $width, $height, $depth);
    }

    /**
     * @param int $a1
     * @param int $a2
     * @param int $b1
     * @param int $b2
     * @return array Min and max corners
     * @throws NotIntersectionException
     */
    private static function calculateIntersectionPoints(int $a1, int $a2, int $b1, int $b2): array
    {
        if ($a1 > $b2) {
            throw new NotIntersectionException();
        } elseif ($a1 >= $b1) {
            $min = $a1;
        } elseif ($b1 <= $a2) {
            $min = $b1;
        }

        if ($a2 < $b1) {
            throw new NotIntersectionException();
        } elseif ($a2 <= $b2) {
            $max = $a2;
        } elseif ($b2 >= $a1) {
            $max = $b2;
        }

        return [$min, $max];
    }
}
