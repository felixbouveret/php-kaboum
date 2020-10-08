<?php

require_once('params.php');

require_once('core/game_handler.php');

clearConsole();

$grid = initGrid($gridSize);

createBoat($gridSize, $grid);

displayUI($ammo);
displayGrid($grid, $gridSize);

turn($handler, $grid, $gridSize, $ammo);
