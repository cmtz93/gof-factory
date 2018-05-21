<?php

include 'core.php';
/**
 * Clase para testear 
 *
 */

class Principal {
 public static function init($tFigura, $p1, $p2 = null) { 
	$figura = FiguraFactory::getFigura($tFigura, $p1, $p2);
	$figura->print();
 }
}


Principal::init(0, rand(1, 100));
Principal::init(1, rand(1, 100));
Principal::init(2, rand(1, 100), rand(1,100));
