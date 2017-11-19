<?php
namespace Cubes\Domain\ValueObject;

/**
 * Class Coordinates
 * @package Cubes\Domain\ValueObject
 */
class Coordinates
{
    /** @var int */
    private $x;

    /** @var int */
    private $y;

    /** @var int */
    private $z;

    /**
     * Coordinates constructor.
     *
     * @param int $x
     * @param int $y
     * @param int $z
     */
    public function __construct(int $x, int $y, int $z)
    {
        $this->x = $x;
        $this->y = $y;
        $this->z = $z;
    }

    /**
     * @return int
     */
    public function x(): int
    {
        return $this->x;
    }

    /**
     * @return int
     */
    public function y(): int
    {
        return $this->y;
    }

    /**
     * @return int
     */
    public function z(): int
    {
        return $this->z;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return "(" . $this->x . "," . $this->y . "," . $this->z . ")";
    }
}
