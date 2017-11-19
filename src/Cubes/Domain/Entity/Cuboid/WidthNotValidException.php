<?php
namespace Cubes\Domain\Entity\Cuboid;

/**
 * Class WidthNotValidException
 * @package Cubes\Domain\Entity\Cuboid
 */
class WidthNotValidException extends \Exception
{
    public function __construct(\Exception $previous = null)
    {
        parent::__construct("Width must be an integer number greater than zero", 500, $previous);
    }
}
