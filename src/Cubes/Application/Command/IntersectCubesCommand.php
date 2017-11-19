<?php
namespace Cubes\Application\Command;

/**
 * Class IntersectCubesCommand
 * @package Cubes\Application\Command
 */
class IntersectCubesCommand implements Command
{
    public $xCube1;

    public $yCube1;

    public $zCube1;

    public $edgeSizeCube1;

    public $xCube2;

    public $yCube2;

    public $zCube2;

    public $edgeSizeCube2;

    /**
     * IntersectCubesCommand constructor.
     * @param $xCube1
     * @param $yCube1
     * @param $zCube1
     * @param $edgeSizeCube1
     * @param $xCube2
     * @param $yCube2
     * @param $zCube2
     * @param $edgeSizeCube2
     */
    public function __construct($xCube1, $yCube1, $zCube1, $edgeSizeCube1, $xCube2, $yCube2, $zCube2, $edgeSizeCube2)
    {
        $this->xCube1 = $xCube1;
        $this->yCube1 = $yCube1;
        $this->zCube1 = $zCube1;
        $this->edgeSizeCube1 = $edgeSizeCube1;
        $this->xCube2 = $xCube2;
        $this->yCube2 = $yCube2;
        $this->zCube2 = $zCube2;
        $this->edgeSizeCube2 = $edgeSizeCube2;
    }
}
