<?php
namespace Cubes\Application\Handler;

use Cubes\Application\Command\Command;
use Cubes\Application\Command\IntersectCubesCommand;
use Cubes\Domain\Entity\Cube\Cube;
use Cubes\Domain\Entity\CubeIntersection\CubeIntersection;
use Cubes\Domain\ValueObject\Coordinates;

/**
 * Class IntersectCubesCommandHandler
 * @package Cubes\Application\Handler
 */
final class IntersectCubesCommandHandler implements CommandHandler
{
    /**
     * @param IntersectCubesCommand $command
     */
    public function handle(Command $command)
    {
        $positionCube1 = new Coordinates($command->xCube1, $command->yCube1, $command->zCube1);
        $positionCube2 = new Coordinates($command->xCube2, $command->yCube2, $command->zCube2);

        $cube1 = Cube::build($positionCube1, $command->edgeSizeCube1);
        $cube2 = Cube::build($positionCube2, $command->edgeSizeCube2);

        $intersection = CubeIntersection::intersect($cube1, $cube2);

        return $intersection->calculateVolume();
    }
}
