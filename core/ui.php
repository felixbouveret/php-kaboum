<?php
class GameUI
{
    private $ammo;

    private function __construct($ammo)
    {
        $this->ammo = $ammo;
    }

    public static function display(int $ammo)
    {
        $gameUi = new GameUI($ammo);
        return $gameUi;
    }

    public function displayAmmo()
    {
        echo "Munition restante : " . $this->ammo . "\n\r\r";
    }

    public function getAmmo()
    {
        return $this->ammo;
    }

    public function setAmmo($ammo)
    {
        $this->ammo = $ammo;
    }

    public function decrementAmmo()
    {
        $this->ammo--;
    }
}
