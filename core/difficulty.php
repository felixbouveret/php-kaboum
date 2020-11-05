<?php 

namespace core;

class Difficulty {

    private $nbAmmo;
    private $nbBoat;
    private $gridSize;
    private $paramDifficulty;

    function __construct($handler, $paramDifficulty) {

    $this->handler = $handler;
    $this->paramDifficulty = $paramDifficulty;

    }
    public function set() {

    clearConsole();

    while(!$this->setDifficulty()) {
        echo "Error, you must type a NUMBER between 1 and 3 \n\r";
    };

    clearConsole();

    return $this;

    }

    public function getParams() {
    
    return [
        'gridSize' => $this->gridSize,
        'nbBoat' => $this->nbBoat,
        'nbAmmo' => $this->nbAmmo
    ];

    }

    protected function setDifficulty() {

        echo "Which difficulty (1 : Easy, 2 : Medium, 3 : Hard) : ";

        $clientDifficulty = $this->getClientDifficulty();

        if(!is_int($clientDifficulty)) {return false;}
        if($clientDifficulty < 1 || $clientDifficulty > 3) {return false;}

        switch($clientDifficulty) {

            case 1 :
            $difficultyChoosen = $this->paramDifficulty['easy'];
            break;

            case 2 :
            $difficultyChoosen = $this->paramDifficulty['medium'];
            break;

            case 3 :
            $difficultyChoosen = $this->paramDifficulty['hard'];
            break;

            default :
            return false;
            break;

        }
        
        $this->gridSize = $difficultyChoosen['gridSize'];
        $this->nbBoat = $difficultyChoosen['nbBoat'];
        $this->nbAmmo = $difficultyChoosen['nbAmmo'];

        return true;

    }

    protected function getClientDifficulty() {

        $clientInput = fgets($this->handler);
        $clientDifficultyString = trim($clientInput);
        $clientDifficulty = intval($clientDifficultyString);

        return $clientDifficulty;

    }


}