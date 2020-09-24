<?php
$handler = fopen("php://stdin", "r");


function initGrid()
{
  $grid = array();
  for ($i = 0; $i < 10; $i++) {
    array_push($grid, []);
    for ($o = 0; $o < 10; $o++) {
      array_push($grid[$i], [
        'targeted' => false,
        'isBoat' => false
      ]);
    }
  };
  return $grid;
};


function verifyPosition($x, $y, &$the_grid)
{
  if ($the_grid[$x - 1][$y - 1]['targeted'] === true) {
    return 'X ';
  } else {
    return '• ';
  };
};


function displayGrid(&$the_grid)
{
  $displayGrid = [];

  for ($i = 0; $i < 12; $i++) {

    $column = [];

    for ($o = 0; $o < 12; $o++) {


      if ($i === 0 || $i === 11) {
        array_push($column, "* ");
        print_r('* ');
      } else {

        if ($o === 0 || $o === 11) {

          print_r('* ');
          array_push($column, "* ");
        } else {
          $verification = verifyPosition($o, $i, $the_grid);

          print_r($verification);
          array_push($column, $verification);
        }
      };

      if ($o === 11) {

        print_r("\n\r");
      }
    };
    array_push($displayGrid, $column);
  };

  return $displayGrid;
};



function turn($handl, &$the_grid)
{
  echo "Coordonnées (x,y): ";
  $coord = fgets($handl);
  $array_coord = array_map('intval', explode(',', $coord));

  $the_grid[$array_coord[0] - 1][$array_coord[1] - 1]["targeted"] = true;
  displayGrid($the_grid);
  turn($handl, $the_grid);
};

$grid = initGrid();
displayGrid($grid);
$test = 0;

turn($handler, $grid);
