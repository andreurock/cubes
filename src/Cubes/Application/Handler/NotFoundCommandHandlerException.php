<?php
namespace Cubes\Application\Handler;

/**
 * Class NotFoundCommandHandlerException
 * @package Cubes\Application\Handler
 */
class NotFoundCommandHandlerException extends \Exception
{
    /**
     * @param string $commandClassName
     * @param string $commandHandlerMap
     */
    public function __construct($commandClassName, $commandHandlerMap)
    {
        $this->message = sprintf('Command %s not found in %', $commandClassName, $commandHandlerMap);
    }
}
