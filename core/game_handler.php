<?php

require_once('grid.php');

require_once('boat.php');

require_once('ui.php');

require_once('difficulty.php');

function gameover()
{
  clearConsole();
  echo "Game Over";
}

function clearConsole()
{

  strtoupper(substr(PHP_OS, 0, 3)) === 'WIN' ? system('cls') : system('clear');
};

function turn($handl, &$grid, $gridSize, $ui)
{
  echo "Coordonnées (x,y): ";
  $coord = fgets($handl);
  $array_coord = array_map('intval', explode(',', $coord));

  $gridArray = $grid->getGrid();
  $gridArray[$array_coord[0] - 1][$array_coord[1] - 1]["targeted"] = true;
  $grid->setGrid($gridArray);
  clearConsole();

  $ui->decrementAmmo();
  $ui->displayAmmo();
  $grid->displayGrid();

  if ($ui->getAmmo() === 0) {

    gameover();
  } else {

    turn($handl, $grid, $gridSize, $ui);
  }
};
