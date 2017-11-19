<?php
namespace Cubes\Domain\Entity\Cube;

/**
 * Class EdgesSizesNotValidException
 * @package Cubes\Domain\Entity\Cube
 */
class EdgesSizesNotValidException extends \Exception
{
    public function __construct(\Exception $previous = null)
    {
        parent::__construct("Edge size must be an integer number greater than zero", 500, $previous);
    }
}
