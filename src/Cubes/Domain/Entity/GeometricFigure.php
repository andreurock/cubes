<?php
namespace Cubes\Domain\Entity;

use Cubes\Domain\ValueObject\Coordinates;

/**
 * Class GeometricFigure
 * @package Cubes\Domain\Entity
 */
abstract class GeometricFigure
{
    /** @var Coordinates */
    protected $position;

    /**
     * @return Coordinates
     */
    public function position(): Coordinates
    {
        return $this->position;
    }

    /**
     * Calculates if the edges size value is valid
     *
     * @param int $edgeSize
     * @return bool
     */
    protected static function edgeSizeIsValid(int $edgeSize): bool
    {
        return $edgeSize > 0;
    }

    /**
     * Calculates the volume of the geometric figure.
     *
     * @return int
     */
    abstract public function calculateVolume(): int;
}