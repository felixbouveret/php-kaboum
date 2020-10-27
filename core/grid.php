<?php 

class Grid {

  private $gridSize;
  private $grid;

  const BORDER = '* ';
  const TOUCHED = 'X ';
  const BLANK = '• ';
  const NOT_TOUCHED = 'O ';

  function __construct(int $gridSize) {

    $this->gridSize = $gridSize;

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

    $this->grid = $grid;

  }

  public static function create(int $gridSize) {
    $class = new Grid($gridSize);
    return $class;
  }

  public function getGrid() {
    return $this->grid;
  }
  
  public function getGridSize() {
    return $this->gridSize;
  }

  public function setGrid(array $newGrid) {
    $this->grid = $newGrid;
  }

  private function verifyPosition($column, $row) {

    if ($this->grid[$row - 1][$column - 1]['targeted']) {

      if ($this->grid[$row - 1][$column - 1]['isBoat']) {
        return self::TOUCHED;
      };
  
      return self::NOT_TOUCHED;

    } 

    return self::BLANK;

  }

  public function displayGrid() {

    for ($row = 0; $row < $this->gridSize + 2; $row++) {
      for ($column = 0; $column < $this->gridSize + 2; $column++) {
        if ($column === 0 && $row !== $this->gridSize + 1) {
  
          print_r($row . " ");
  
        } else if ($column === $this->gridSize + 1) {
  
          print_r(self::BORDER);
  
        } else {
  
          if ($row === 0) {
  
            print_r($column . " ");

          } else if ($row === $this->gridSize + 1) {

            print_r(self::BORDER);

          } else {
  
            $verification = $this->verifyPosition($column, $row);
            print_r($verification);
  
          }
        };
        if ($column === $this->gridSize + 1) {
  
          print_r("\n\r");

        }
      };
    };
  }

}




