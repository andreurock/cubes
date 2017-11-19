<?php
namespace Cubes\Domain\Entity\CubeIntersection;

/**
 * Class GeometricFigureIsNotACubeException
 * @package Cubes\Domain\Entity\CubeIntersection
 */
class GeometricFigureIsNotACubeException extends \Exception
{
    public function __construct(\Exception $previous = null)
    {
        parent::__construct("Geometric figure provided to intersect must be a Cube", 500, $previous);
    }
}
