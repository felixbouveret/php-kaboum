<?php

// Require -------------------------------------------------------
require_once('params.php');
require_once('core/game_handler.php');
// ---------------------------------------------------------------

checkDifficulty($handler, $gridSize, $nbBoat, $nbAmmo, $paramDifficulty);

$grid = Grid::create($gridSize);
$boats = new Boat($grid, $nbBoat);
$boats->create();

displayUI($nbAmmo);
$grid->displayGrid();

turn($handler, $grid, $gridSize, $nbAmmo);
