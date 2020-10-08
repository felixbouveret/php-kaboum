<?php

require_once('grid.php');

require_once('boat.php');

require_once('ui.php');

function gameover() {
  clearConsole();
  echo "Game Over";
}

function turn($handl, &$the_grid, $gridSize, &$ammo)
{
  echo "Coordonnées (x,y): ";
  $coord = fgets($handl);
  $array_coord = array_map('intval', explode(',', $coord));

  $the_grid[$array_coord[0] - 1][$array_coord[1] - 1]["targeted"] = true;
  clearConsole();
  $ammo--;
  
  displayUI($ammo);
  displayGrid($the_grid, $gridSize);

  if($ammo === 0) {

    gameover();

  } else {

    turn($handl, $the_grid, $gridSize, $ammo);

  }

};

function clearConsole()
{

  strtoupper(substr(PHP_OS, 0, 3)) === 'WIN' ? system('cls') : system('clear');
  
};