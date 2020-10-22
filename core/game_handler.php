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

function checkDifficulty($handler, &$gridSize, &$nbBoat, &$nbAmmo, $paramDifficulty) {

  clearConsole();
  
  while(!setDifficulty($handler, $gridSize, $nbBoat, $nbAmmo, $paramDifficulty)) {
    echo "Error, you must type a NUMBER between 1 and 3 \n\r";
  };

  clearConsole();

}

function getClientDifficulty($handl) {
  $clientInput = fgets($handl);
  $clientDifficultyString = trim($clientInput);
  $clientDifficulty = intval($clientDifficultyString);

  return $clientDifficulty;
}

function setDifficulty($handl, &$gridSize, &$nbBoat, &$nbAmmo, $paramDifficulty) {

  echo "Which difficulty (1 : Easy, 2 : Medium, 3 : Hard) : ";

  $clientDifficulty = getClientDifficulty($handl);

  if(!is_int($clientDifficulty)) {return false;}
  if($clientDifficulty < 1 || $clientDifficulty > 3) {return false;}

  switch($clientDifficulty) {

    case 1 :
      $difficultyChoosen = $paramDifficulty['easy'];
    break;

    case 2 :
      $difficultyChoosen = $paramDifficulty['medium'];
    break;

    case 3 :
      $difficultyChoosen = $paramDifficulty['hard'];
    break;

    default :
      return false;
    break;

  }
  
  $gridSize = $difficultyChoosen['gridSize'];
  $nbBoat = $difficultyChoosen['nbBoat'];
  $nbAmmo = $difficultyChoosen['nbAmmo'];

  return true;
    
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