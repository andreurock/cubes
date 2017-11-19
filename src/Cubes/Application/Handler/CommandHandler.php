<?php
namespace Cubes\Application\Handler;

use Cubes\Application\Command\Command;

/**
 * Interface CommandHandler
 * @package Cubes\Application\Handler
 */
interface CommandHandler
{
    /**
     * @param Command $command
     */
    public function handle(Command $command);
}
