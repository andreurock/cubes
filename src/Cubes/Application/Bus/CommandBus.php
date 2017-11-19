<?php
namespace Cubes\Application\Bus;

use Cubes\Application\Command\Command;

/**
 * Interface CommandBus
 * @package Cubes\Application
 */
interface CommandBus
{
    /**
     * @param Command $command
     */
    public function dispatch(Command $command);
}
