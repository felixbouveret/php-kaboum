<?php

require_once('grid.php');

require_once('boat.php');

function turn($handl, &$the_grid, $gridSize)
{
  echo "Coordonnées (x,y): ";
  $coord = fgets($handl);
  $array_coord = array_map('intval', explode(',', $coord));

  $the_grid[$array_coord[0] - 1][$array_coord[1] - 1]["targeted"] = true;
  clearConsole();
  displayGrid($the_grid, $gridSize);
  turn($handl, $the_grid, $gridSize);
};

function clearConsole()
{

  strtoupper(substr(PHP_OS, 0, 3)) === 'WIN' ? system('cls') : system('clear');
  
};