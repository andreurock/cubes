<?php
namespace Cubes\Domain\Entity\Cuboid;

use Cubes\Domain\Entity\GeometricFigure;
use Cubes\Domain\ValueObject\Coordinates;

/**
 * Class Cuboid
 * @package Cubes\Domain\Entity\Cuboid
 */
class Cuboid extends GeometricFigure
{
    /** @var CuboidId */
    protected $id;

    /** @var int */
    protected $width;

    /** @var int */
    protected $height;

    /** @var int */
    protected $depth;

    /**
     * Cuboid constructor.
     * @param CuboidId $id
     * @param Coordinates $position
     * @param int $width
     * @param int $height
     * @param int $depth
     */
    protected function __construct(CuboidId $id, Coordinates $position, int $width, int $height, int $depth)
    {
        $this->id = $id;
        $this->position = $position;
        $this->width = $width;
        $this->height = $height;
        $this->depth = $depth;
    }

    public static function build(Coordinates $position, int $width, int $height, int $depth): self
    {
        if (! static::edgeSizeIsValid($width)) {
            throw new WidthNotValidException();
        }

        if (! static::edgeSizeIsValid($height)) {
            throw new HeightNotValidException();
        }

        if (! static::edgeSizeIsValid($depth)) {
            throw new DepthNotValidException();
        }

        return new self(new CuboidId(), $position, $width, $height, $depth);
    }

    /**
     * Calculates the volume of the cuboid.
     *
     * @return int
     */
    public function calculateVolume(): int
    {
        return $this->width * $this->height * $this->depth;
    }

    /**
     * @return CuboidId
     */
    public function id(): CuboidId
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function width(): int
    {
        return $this->width;
    }

    /**
     * @return int
     */
    public function height(): int
    {
        return $this->height;
    }

    /**
     * @return int
     */
    public function depth(): int
    {
        return $this->depth;
    }
}
