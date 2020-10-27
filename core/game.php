<?php 

class GameHandler {

    private $handler;
    private $grid;
    private $ui;

    function __construct(object $ui, object $grid, $handler) {

        $this->handler = $handler;
        $this->grid = $grid;
        $this->ui = $ui;

    }

    private function verifyWin() {
        return $this->grid->isGridWin();
    }

    private function verifyLoose() {
    if ($this->ui->getAmmo() === 0) {
        return true;
    }

    return false;
    }

    private function turn() {

        echo "Coordonnées (x,y): ";
        $coord = fgets($this->handler);
        $array_coord = array_map('intval', explode(',', $coord));

        
        $this->setFirePosition($array_coord);
        $this->ui->decrementAmmo();
        $this->showUI();

        if($this->verifyWin()){echo $this->gameWin(); return;}
        if($this->verifyLoose()){echo $this->gameOver(); return;}

        $this->turn();
    }

    private function gameWin(){
        clearConsole();
        return "Win !";
    }

    private function gameOver(){
        clearConsole();
        return "Loose !";
    }

    public function setFirePosition(array $array_coord){
        $gridArray = $this->grid->getGrid();
        $gridArray[$array_coord[1] - 1][$array_coord[0] - 1]["targeted"] = true;
        $this->grid->setGrid($gridArray);
        clearConsole();
        }
        public function showUI(){
        $this->ui->displayAmmo();
        $this->grid->displayGrid();
    }

    public static function start(object $ui, object $grid, $handler){

        $game = new GameHandler($ui, $grid, $handler);
        $game->turn();
    
    }
}