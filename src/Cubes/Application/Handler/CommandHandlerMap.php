<?php
namespace Cubes\Application\Handler;

/**
 * Interface CommandHandlerMap
 * @package Cubes\Application\Handler
 */
interface CommandHandlerMap
{
    /**
     * @param string $command
     * @return CommandHandler
     */
    public function getCommand($command);
}
