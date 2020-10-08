<?php
$handler = fopen("php://stdin", "r");

$gridSize = 7;

function initGrid($gridSize)
{
  $grid = array();

  for ($i = 0; $i < $gridSize; $i++) {
    array_push($grid, []);
    for ($o = 0; $o < $gridSize; $o++) {
      array_push($grid[$i], [
        'targeted' => false,
        'isBoat' => false
      ]);
    }
  };

  return $grid;
};

function createBoat($gridSize, $grid)
{
  $boats = 3;
  $boatList = [2, 3, 4];

  for ($boat = 0; $boat < $boats; $boat++) {
    $isVertical = rand(0, 1) ? true : false;
    $randomBoatSize = array_rand($boatList, 1);

    if ($isVertical) {
      $randomRow = rand($randomBoatSize, $gridSize) - $randomBoatSize;
      $randomColumn = rand(0, $gridSize);
    } else {
      $randomRow = rand(0, $gridSize);
      $randomColumn = rand($randomBoatSize, $gridSize) - $randomBoatSize;
    }

    setBoatPosition(
      $grid,
      $randomRow,
      $randomColumn,
      $randomBoatSize,
      $isVertical
    );
  }
};

function setBoatPosition($grid, $x, $y, $boatSize, $isVertical)
{
  if ($isVertical) {
    for ($i = 0; $i < $boatSize; $i++) {
      $grid[$x + $i][$y]['isBoat'] = true;
    }
  } else {
    for ($i = 0; $i < $boatSize; $i++) {
      $grid[$x][$y + $i]['isBoat'] = true;
    }
  }
};

function verifyPosition($x, $y, &$the_grid)
{
  if ($the_grid[$x - 1][$y - 1]['targeted']) {

    if ($the_grid[$x - 1][$y - 1]['isBoat']) {
      return 'X ';
    };

    return 'O ';
  } else {

    return '• ';
  };
};


function displayGrid(&$the_grid, $gridSize)
{
  $displayGrid = [];

  for ($i = 0; $i < $gridSize + 2; $i++) {

    $column = [];

    for ($o = 0; $o < $gridSize + 2; $o++) {


      if ($i === 0 || $i === $gridSize + 1) {
        array_push($column, "* ");
        print_r('* ');
      } else {

        if ($o === 0 || $o === $gridSize + 1) {

          print_r('* ');
          array_push($column, "* ");
        } else {
          $verification = verifyPosition($o, $i, $the_grid);

          print_r($verification);
          array_push($column, $verification);
        }
      };

      if ($o === $gridSize + 1) {

        print_r("\n\r");
      }
    };
    array_push($displayGrid, $column);
  };

  return $displayGrid;
};



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
  system('clear');
  system('cls');
};

clearConsole();

$grid = initGrid($gridSize);

createBoat($gridSize, $grid);

displayGrid($grid, $gridSize);

turn($handler, $grid, $gridSize);
