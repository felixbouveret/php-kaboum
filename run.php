<?php

use core\Boats;
use core\Difficulty;
use core\GameHandler;
use core\Grid;
use core\GameUI;
// Require -------------------------------------------------------
require_once('params.php');
require_once('helpers/helpers.php');
require_once('autoload.php');
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