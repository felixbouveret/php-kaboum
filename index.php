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



function turn($handl)
{
  echo "Coordonnées (x,y): ";
  $coord = fgets($handl);
  $array_coord = array_map('intval', explode(',', $coord));

  var_dump($array_coord);
};

$grid = initGrid();
var_dump($grid);

turn($handler);
