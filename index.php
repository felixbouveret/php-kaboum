<?php
$handler = fopen("php://stdin", "r");


function initGrid()
{
  $grid = array();
  for ($i = 0; $i < 10; $i++) {
    array_push($grid, []);
    for ($o = 0; $o < 10; $o++) {
      array_push($grid[$i], []);
    }
  };
  return $grid;
};

function displayGrid()
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
          
          print_r('• ');
          array_push($column, "• ");

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
  
  $the_grid[$array_coord[0]][$array_coord[1]] = 'caca';
};

// $grid = initGrid();
$ret = displayGrid();
$test = 0;

turn($handler, $grid);
// var_dump($grid);
