<?php
namespace Cubes\Application\Handler;

use Cubes\Application\Command\Command;

/**
 * Class StandardCommandHandlerLocator
 * @package Cubes\Application\Handler
 */
final class StandardCommandHandlerLocator implements CommandHandlerLocator
{
    /**
     * @var CommandHandlerMap
     */
    protected $commandHandlerMap;

    /**
     * @param $commandHandlerMap
     */
    public function __construct(CommandHandlerMap $commandHandlerMap)
    {
        $this->commandHandlerMap = $commandHandlerMap;
    }

    /**
     * @param Command $command
     * @return CommandHandler
     */
    public function getHandler(Command $command)
    {
        return $this->commandHandlerMap->getCommand(get_class($command));
    }
}
