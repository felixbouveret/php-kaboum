<?php

require_once('core/game_handler.php');

$handler = fopen("php://stdin", "r");

$gridSize = 9;

clearConsole();

$grid = initGrid($gridSize);

createBoat($gridSize, $grid);

displayGrid($grid, $gridSize);

turn($handler, $grid, $gridSize);
