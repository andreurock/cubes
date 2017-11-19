<?php
namespace Cubes\Application\Handler;

use Cubes\Application\Command\Command;

/**
 * Interface CommandHandlerLocator
 * @package Cubes\Application\Handler
 */
interface CommandHandlerLocator
{
    /**
     * @param Command $command
     * @return CommandHandler
     */
    public function getHandler(Command $command);
}
