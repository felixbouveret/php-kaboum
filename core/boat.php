<?php

class Boats {

  const BOATLIST = [2,3,4];
  private $boats;
  private $grid;
  private $gridSize;

  function __construct(object $grid, int $boats) {

    $this->grid = $grid;
    $this->gridSize = $grid->getGridSize();
    $this->boats = $boats;

  }

  public function create() {

    for ($boat = 0; $boat < $this->boats; $boat++) {

      $isVertical = rand(0, 1) ? true : false;
      $randomBoatSizeKey = array_rand(self::BOATLIST, 1);
      $randomBoatSize = self::BOATLIST[$randomBoatSizeKey];

      if ($isVertical) {
        $randomRow = rand($randomBoatSize, $this->gridSize - 1) - $randomBoatSize;
        $randomColumn = rand(0, $this->gridSize - 1);
      } else {
        $randomRow = rand(0, $this->gridSize - 1);
        $randomColumn = rand($randomBoatSize, $this->gridSize - 1) - $randomBoatSize;
      }

      $this->setBoatPosition(
        $randomColumn,
        $randomRow,
        $randomBoatSize,
        $isVertical
      );

    }
  }

  public function setBoatPosition($column, $row, $boatSize, $isVertical)
  {
    $grid = $this->grid->getGrid();

    if ($isVertical) {
      for ($i = 0; $i < $boatSize; $i++) {
        $grid[$row][$column + $i]['isBoat'] = true;
      }
    } else {
      for ($i = 0; $i < $boatSize; $i++) {
        $grid[$row + $i][$column]['isBoat'] = true;
      }
    }

    $this->grid->setGrid($grid);
  }
}

