<?php

// Require -------------------------------------------------------
require_once('params.php');
require_once('core/grid.php');
require_once('core/boat.php');
require_once('core/ui.php');
require_once('core/difficulty.php');
require_once('core/game.php');
require_once('helpers/helpers.php');
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

GameHandler::start($ui, $grid, $handler);
