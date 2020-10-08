<?php

function createBoat($gridSize, &$grid, &$boats)
{
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