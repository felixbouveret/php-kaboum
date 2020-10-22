<?php

// Handler Client
// ------------------------------------------------
$handler = fopen("php://stdin", "r");

// Params initialisation 
// ------------------------------------------------
$gridSize = 0;
$nbAmmo = 0;
$nbBoats = 0;

// Array or different difficulty
// ------------------------------------------------

$paramDifficulty = [

    "easy" => [

        "gridSize" => 5,
        "nbBoat" => 1,
        "nbAmmo" => 20
    ],

    "medium" => [

        "gridSize" => 7,
        "nbBoat" => 2,
        "nbAmmo" => 20
    ],

    "hard" => [
        "gridSize" => 9,
        "nbBoat" => 3,
        "nbAmmo" => 15
    ]
];

// ------------------------------------------------