<?php
namespace Cubes\Domain\Entity\Cuboid;

/**
 * Class HeightNotValidException
 * @package Cubes\Domain\Entity\Cuboid
 */
class HeightNotValidException extends \Exception
{
    public function __construct(\Exception $previous = null)
    {
        parent::__construct("Height must be an integer number greater than zero", 500, $previous);
    }
}
