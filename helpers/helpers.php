<?php

function clearConsole()
{
  strtoupper(substr(PHP_OS, 0, 3)) === 'WIN' ? system('cls') : system('clear');
};
  

