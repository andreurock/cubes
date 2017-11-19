<?php
namespace Cubes\Application\Bus;

use Cubes\Application\Command\Command;
use Cubes\Application\Handler\CommandHandlerLocator;

/**
 * Class StandardCommandBus
 * @package Cubes\Application\Bus
 */
final class StandardCommandBus implements CommandBus
{
    /**
     * @var CommandHandlerLocator
     */
    private $commandHandlerLocator;

    /**
     * StandardCommandBus constructor.
     * @param CommandHandlerLocator $commandHandlerLocator
     */
    public function __construct(CommandHandlerLocator $commandHandlerLocator)
    {
        $this->commandHandlerLocator = $commandHandlerLocator;
    }

    /**
     * @param Command $command
     */
    public function dispatch(Command $command)
    {
        return ($this
            ->commandHandlerLocator
            ->getHandler($command)
        )->handle($command);
    }
}
