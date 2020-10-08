<?php

// Require -------------------------------------------------------
require_once('params.php');
require_once('core/game_handler.php');
// ---------------------------------------------------------------

clearConsole();

setDifficulty($handler, $gridSize, $nbBoat, $nbAmmo);

clearConsole();

$grid = initGrid($gridSize);

createBoat($gridSize, $grid, $nbBoat);

displayUI($nbAmmo);
displayGrid($grid, $gridSize);

turn($handler, $grid, $gridSize, $nbAmmo);
