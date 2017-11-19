<?php
namespace Cubes\Domain\Entity\CubeIntersection;

/**
 * Class NotIntersectionException
 * @package Cubes\Domain\Entity\CubeIntersection
 */
class NotIntersectionException extends \Exception
{
    public function __construct(\Exception $previous = null)
    {
        parent::__construct("Geometric figure are not intersecting", 500, $previous);
    }
}