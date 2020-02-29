<?php
	class Rectangulo{
		private $base;
		private $altura;

		public function __construct($b,$a){//Previo a la palabra construct deben ir dos guion bajo seguidos	.	
			$this->base=$b;
			$this->altura=$a;// Para asignar debe llevar this y no debe estar separado por espacios.
		}//Debe usarse $this para poder acceder a los atributos privados de nuestra clase

		public function area(){
			return ($this->base * $this->altura);
		}

		public function perimetro(){
			return ($this->base*2 + $this->altura*2);
		}

		public function escribir($cad){
			echo "<hr>$cad<br>";
			echo "Base = $this->base <br>";
			echo "Altura = $this->altura <br>";
		}

	}
?>