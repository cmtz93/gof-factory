<?php

interface Metodos {

  public function getArea();
  public function getTipoFigura();
  public function getLado();
  public function getBase();
  public function getAltura();
  public function getRadio();
}

abstract class Figura implements Metodos
{	
	protected $lado = 'null';
	protected $base = 'null';
	protected $altura = 'null';
	protected $radio = 'null';
	protected $nombre;

	function __construct($nombre) {
		$this->nombre = $nombre;
	}

	/**
	 * Encapsulado de propiedades
	**/
  public function getTipoFigura() { return $this->nombre; }
  public function getLado() { return $this->lado; }
  public function getBase() { return $this->base; }
  public function getAltura() { return $this->altura; }
  public function getRadio() { return $this->radio; }

  public function setTipoFigura($nombre) { $this->nombre = $nombre; }
  public function setLado($lado) { $this->lado = $lado; }
  public function setBase($base) { $this->base = $base; }
  public function setAltura($altura) { $this->altura = $altura; }
  public function setRadio($radio) { $this->radio = $radio; }

  public function print() {
		echo "Tipo de Figura: ". $this->getTipoFigura() . "\n";
		echo "Lado: ". $this->getLado() . "\n";
		echo "Base: ". $this->getBase() . "\n";
		echo "Altura: ". $this->getAltura() . "\n";
		echo "Radio: ". $this->getRadio() . "\n";
		echo "El area es de: ". $this->getArea() . "\n";
  }

}

class Circulo extends Figura {

	function __construct($radio) {
		parent::__construct('CIRCULO');
	  $this->radio = $radio;
	}
 
	public function getArea() {
	  return (3.14 * $this->radio * $this->radio);
	}

}

class Triangulo extends Figura {
 
  function __construct($base, $altura) {
		parent::__construct('TRIANGULO');
  	$this->base = $base;
  	$this->altura = $altura;
  }
 
 	public function getArea() {
  	return ((1 / 2) * $this->base * $this->altura);
 	}

}

class Cuadrado extends Figura {
 
 	function __construct($lado) {
		parent::__construct('CUADRADO');
 		$this->lado = $lado;
 	}
 
 	public function getArea() {
  	return $this->lado * $this->lado;
 	}

}

class FiguraFactory {
 	const CUADRADO = 0;
 	const CIRCULO = 1;
 	const TRIANGULO = 2;
 
 	public static function getFigura($tipo, $p1, $p2 = null) {
  	switch ($tipo) {
   		case self::CUADRADO:
    		return new Cuadrado($p1);
   		case self::CIRCULO:
    		return new Circulo($p1);
   		case self::TRIANGULO:
    		return new Triangulo($p1, $p2);
  	}  
  	return null;
 	}

}
