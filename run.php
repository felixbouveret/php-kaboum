<?php

// Require -------------------------------------------------------
require_once('params.php');
require_once('core/game_handler.php');
// ---------------------------------------------------------------

$difficulty = new Difficulty($handler, $paramDifficulty);
$difficulty->set();

$params = $difficulty->getParams();

$grid = Grid::create($params['gridSize']);
$boats = new Boats($grid, $params['nbBoat']);
$boats->create();

$ui = GameUI::display($params['nbAmmo']);
$ui->displayAmmo();
$grid->displayGrid();

turn($handler, $grid, $gridSize, $ui);
