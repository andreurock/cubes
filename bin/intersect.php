<?php

require_once __DIR__ . '/../vendor/autoload.php';

echo "*Calculate intersection volume of 2 cubes*" . PHP_EOL . PHP_EOL;
echo "Define cube #1" . PHP_EOL;
$x1 = (int)readline("Coordinate x: ");
$y1 = (int)readline("Coordinate y: ");
$z1 = (int)readline("Coordinate z: ");
$edgeSize1 = (int)readline("Edge size: ");

echo PHP_EOL . "Define cube #2" . PHP_EOL;
$x2 = (int)readline("Coordinate x: ");
$y2 = (int)readline("Coordinate y: ");
$z2 = (int)readline("Coordinate z: ");
$edgeSize2 = (int)readline("Edge size: ");

$commandHandlerMap = [
    \Cubes\Application\Command\IntersectCubesCommand::class => new \Cubes\Application\Handler\IntersectCubesCommandHandler()
];

$standardCommandBus = new \Cubes\Application\Bus\StandardCommandBus(
    new \Cubes\Application\Handler\StandardCommandHandlerLocator(
        new \Cubes\Application\Handler\InMemoryCommandHandlerMap($commandHandlerMap)
    )
);

echo PHP_EOL . "Calculating..." . PHP_EOL . PHP_EOL;

$volume = $standardCommandBus->dispatch(new \Cubes\Application\Command\IntersectCubesCommand($x1, $y1, $z1, $edgeSize1, $x2, $y2, $z2, $edgeSize2));

echo "Volume: " . $volume . PHP_EOL;
echo "Bye bye!" . PHP_EOL;
