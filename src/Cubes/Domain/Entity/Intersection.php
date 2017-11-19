<?php
namespace Cubes\Domain\Entity;

/**
 * Interface Intersection
 * @package Cubes\Domain\Entity
 */
interface Intersection
{
    /**
     * @param GeometricFigure $figure1
     * @param GeometricFigure $figure2
     * @return mixed
     */
    public static function intersect(GeometricFigure $figure1, GeometricFigure $figure2);
}
