<?php

use Ddaniel\GhReleases\Calculator;

require_once './vendor/autoload.php';

echo ( new Calculator() )->add( 1, 1 );
