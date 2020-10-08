<?php

require_once('grid.php');

require_once('boat.php');

require_once('ui.php');

function gameover() {
  clearConsole();
  echo "Game Over";
}

function clearConsole()
{

  strtoupper(substr(PHP_OS, 0, 3)) === 'WIN' ? system('cls') : system('clear');
  
};

function setDifficulty($handl, &$gridSize, &$nbBoat, &$nbAmmo) {

  echo "Which difficulty (1 : Easy, 2 : Medium, 3 : Hard) : ";

  $clientDifficulty = fgets($handl);
  $clientDifficulty = trim($clientDifficulty);
  $clientDifficulty = intval($clientDifficulty);

  if(is_int($clientDifficulty)) {
    if($clientDifficulty >= 1 && $clientDifficulty <= 3) {
      if($clientDifficulty === 1) {

        $gridSize = 5;
        $nbBoat = 1;
        $nbAmmo = 20;

      }elseif($clientDifficulty === 2) {

        $gridSize = 7;
        $nbBoat = 2;
        $nbAmmo = 20;

      }else{

        $gridSize = 9;
        $nbBoat = 3;
        $nbAmmo = 15;

      }
    } else {
      clearConsole();
      echo "You must type a number between 1 and 3 \n\r";
      setDifficulty($handl, $gridSize, $nbBoat, $nbAmmo);

    }

  } else {

    clearConsole();
    echo "You must type 1 2 or 3 ! \n\r";
    setDifficulty($handl, $gridSize, $nbBoat, $nbAmmo);

  }
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