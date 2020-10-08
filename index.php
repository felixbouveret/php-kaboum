<?php
$handler = fopen("php://stdin", "r");

$gridSize = 9;

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

function createBoat($gridSize, &$grid)
{
  $boats = 3;
  $boatList = [2, 3, 4];

  for ($boat = 0; $boat < $boats; $boat++) {

    $isVertical = rand(0, 1) ? true : false;
    $randomBoatSizeKey = array_rand($boatList, 1);
    $randomBoatSize = $boatList[$randomBoatSizeKey];

    if ($isVertical) {
      $randomRow = rand($randomBoatSize, $gridSize - 1) - $randomBoatSize;
      $randomColumn = rand(0, $gridSize - 1);
    } else {
      $randomRow = rand(0, $gridSize - 1);
      $randomColumn = rand($randomBoatSize, $gridSize - 1) - $randomBoatSize;
    }

    setBoatPosition(
      $grid,
      $randomColumn,
      $randomRow,
      $randomBoatSize,
      $isVertical
    );
  }
};

function setBoatPosition(&$grid, $x, $y, $boatSize, $isVertical)
{
  if ($isVertical) {
    for ($i = 0; $i < $boatSize; $i++) {
      $grid[$x][$y + $i]['isBoat'] = true;
    }
  } else {
    for ($i = 0; $i < $boatSize; $i++) {
      $grid[$x + $i][$y]['isBoat'] = true;
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
    // if ($the_grid[$x - 1][$y - 1]['isBoat']) {
    //   return 'X ';
    // };
    return '• ';
  };
};


function displayGrid(&$the_grid, $gridSize)
{
  $displayGrid = [];

  for ($i = 0; $i < $gridSize + 2; $i++) {

    $column = [];

    for ($o = 0; $o < $gridSize + 2; $o++) {


      if ($i === 0 && $o !== $gridSize + 1) {

        print_r($o . " ");
        array_push($column, $o . " ");
      } else if ($i === $gridSize + 1) {

        print_r("* ");
        array_push($column, "* ");
      } else {

        if ($o === 0) {

          print_r($i . " ");
          array_push($column, $i . " ");
        } else if ($o === $gridSize + 1) {

          print_r("* ");
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
  strtoupper(substr(PHP_OS, 0, 3)) === 'WIN' ? system('cls') : system('clear');
};

clearConsole();

$grid = initGrid($gridSize);

createBoat($gridSize, $grid);

$grid;

displayGrid($grid, $gridSize);

turn($handler, $grid, $gridSize);
