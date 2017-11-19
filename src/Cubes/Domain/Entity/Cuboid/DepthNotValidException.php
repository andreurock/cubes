<?php
namespace Cubes\Domain\Entity\Cuboid;

/**
 * Class DepthNotValidException
 * @package Cubes\Domain\Entity\Cuboid
 */
class DepthNotValidException extends \Exception
{
    public function __construct(\Exception $previous = null)
    {
        parent::__construct("Depth must be an integer number greater than zero", 500, $previous);
    }
}
