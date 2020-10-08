<?php 

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


function verifyPosition($x, $y, &$the_grid)
{
  if ($the_grid[$x - 1][$y - 1]['targeted']) {

    if ($the_grid[$x - 1][$y - 1]['isBoat']) {
      return 'X ';
    };

    return 'O ';
  } 
    return '• ';

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

