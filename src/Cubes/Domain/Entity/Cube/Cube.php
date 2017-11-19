<?php
namespace Cubes\Domain\Entity\Cube;

use Cubes\Domain\Entity\GeometricFigure;
use Cubes\Domain\ValueObject\Coordinates;

/**
 * Class Cube
 * @package Cubes\Domain\Entity
 */
class Cube extends GeometricFigure
{
    /** @var CubeId */
    private $id;

    /** @var int */
    private $edgeSize;

    /**
     * Cube constructor.
     *
     * @param CubeId $id
     * @param Coordinates $position
     * @param int $edgeSize
     */
    private function __construct(CubeId $id, Coordinates $position, int $edgeSize)
    {
        $this->id = $id;
        $this->position = $position;
        $this->edgeSize = $edgeSize;
    }

    /**
     * Named constructor for Cube.
     *
     * @param Coordinates $position
     * @param int $edgeSize
     * @return Cube
     * @throws EdgesSizesNotValidException
     */
    public static function build(Coordinates $position, int $edgeSize): self
    {
        if (! static::edgeSizeIsValid($edgeSize)) {
            throw new EdgesSizesNotValidException();
        }

        return new self(new CubeId(), $position, $edgeSize);
    }

    /**
     * @return CubeId
     */
    public function id(): CubeId
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function edgeSize(): int
    {
        return $this->edgeSize;
    }

    /**
     * Calculates the volume of the cuboid.
     *
     * @return int
     */
    public function calculateVolume(): int
    {
        return pow($this->edgeSize(), 3);
    }
}
