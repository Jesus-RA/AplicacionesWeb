<?php
	class Conjunto{
		private $tam;
		private $array;

		public function __construct($t){
			$this->tam=$t;
			//$this->array=$a;
			if($t>0){
				for($i=0;$i<$t;$i++){
					$this->array[$i]= rand(1,20);
				}
			}else {
				$this->array= 0;
			}	
		}

		public function agregarElemento($e){
			if($this->tam==0){
				$a[0]=0;
				$this->array = $a;
				$this->array[$this->tam]= $e;			
				$this->tam += 1;			
			}else{
				$this->array[$this->tam]= $e;
				$this->tam += 1;
			}
		}

		public function eliminarElemento($e){
			$aux = $this->array;
			$aux1 = $this->array;
			$count = 0;//Contador de veces que se encontro el numero a eliminar
			for($i=0; $i<$this->tam; $i++){
				if($e == $aux[$i]){//Recorremos el arreglo y donde se encuentre el valor a eliminar se le sustituira
					$aux[$i]=0;//por un cero
					$count +=1;//Se incrementa cada vez que se encuentra
				}
			}
			$i=0;//Inicializamos variables para el borrado
			$j=0;
			while($i < $this->tam){//Ciclo mientras para controlar el tamaño del arreglo
				if($aux[$i]!=0){//Si el valor no es un cero
					$aux1[$j]= $aux[$i];//Se agrega al nuevo arreglo
					$j += 1;//Incrementamos el contador del nuevo arreglo
				}
				$i += 1;
			}
			$this->tam -= $count;//Actualizamos el tamaño del arreglo, restando el numero de veces que fue encontrado el numero a eliminar
			$this->array = $aux1;//Asigna el auxiliar al arreglo de la clase el cual ya no tiene el elmento borrado.
		}

		public function mostrarConjunto($cad){
			echo "<br>";
			echo "$cad: { ";
			$aux = $this->array;			
			echo "$aux[0]";			
			for($i=1; $i<$this->tam; $i++){				
				echo ", $aux[$i] ";
			}	
			echo "} <br>";		
		}

		public function union($arreglo1, $arreglo2){
			if($arreglo1 == 0 && $arreglo2 == 0){
				echo "<script>
					alert('Conjuntos vacios.');
				  </script>";		
				  return false;		  
			}else if($arreglo1 == 0){//Si el conjunto 1 esta vacio
				$k=0;
				for($i=0; $i<count($arreglo2)-1; $i++){
					for($j=$i+1; $j<count($arreglo2);$j++){
						if($arreglo2[$i] == $arreglo2[$j]){
							$arreglo2[$j]=0;
						}
					}
				}
				for($i=0; $i<count($arreglo2); $i++){
					if($arreglo2[$i] != 0){
						$u[$k]= $arreglo2[$i];
						$k += 1;					
					}
				}	
				return $u;
			}else if($arreglo2 == 0){//Si el conjunto dos esta vacio
				$k=0;
				for($i=0; $i<count($arreglo1); $i++){
					for($j=$i+1; $j<count($arreglo1);$j++){
						if($arreglo1[$i] == $arreglo1[$j]){
							$arreglo1[$j]=0;
						}

					}					
				}
				for($i=0; $i<count($arreglo1); $i++){
					if($arreglo1[$i] != 0){
						$u[$k]= $arreglo1[$i];						
						$k += 1;						
					}
					
				}

				return $u;
			}
			else{			

				$t = count($arreglo1);
				$k = 0;
				//Asigna valores no repetidos al arreglo auxiliar
				for($i=0; $i<count($arreglo1); $i++){
					for($j=$i+1; $j<count($arreglo1);$j++){
						if($arreglo1[$i] == $arreglo1[$j]){
							$arreglo1[$j]=0;
						}

					}					
				}
				for($i=0; $i<count($arreglo1); $i++){
					if($arreglo1[$i] != 0){
						$u[$k]= $arreglo1[$i];						
						$k += 1;						
					}
					
				}
				//Encuentra valores repetidos en el arreglo B
				for($i=0; $i<count($arreglo2)-1; $i++){
					for($j=$i+1; $j<count($arreglo2);$j++){
						if($arreglo2[$i] == $arreglo2[$j]){
							$arreglo2[$j]=0;
						}
					}
				}
				for($i=0; $i < $t; $i++){
					for($j=0; $j < count($arreglo2); $j++){
						if($arreglo1[$i] == $arreglo2[$j]){
							$arreglo2[$j]=0;
						}
					}
				}				
				for($i=0; $i < count($arreglo2); $i++){//Este ya no es necesario
					for($j=0; $j < $k; $j++){
						if($u[$j] == $arreglo2[$i]){
							$arreglo2[$i]=0;
						}
					}
				}
				//Asigna los valores no repetidos del arreglo B
				for($i=0; $i<count($arreglo2); $i++){
					if($arreglo2[$i] != 0){
						$u[$k]= $arreglo2[$i];
						$k += 1;					
					}
				}				
				return $u;					
			}
		}

		public function interseccion($arreglo1,$arreglo2){
			/*if($arreglo1 == 0 && $arreglo2 == 0){//Si los conjuntos estan vacios manda una alerta 
				echo "<script>
					alert('Conjuntos vacios.');
				  </script>";
			}
			else{*/				//Si no obtiene los tamaños para trabajar
				$t1 = count($arreglo1);
				$t2 = count($arreglo2);						
				$k = 0;	//Contador del conjunto interseccion
				$band = 1;//Bandera para ver si el elemento ya esta en el conjunto interseccion
				$bres = 0;//Bandera para avisar si se han encontrado elementos en comun o no
				if($t1 > $t2){//Identifica tamaño maximo y minimo para hacer la interseccion
					$max = $t1;
					$min = $t2;
					$auxMax = $arreglo1;
					$auxMin = $arreglo2;
				}else if($t2 > $t1){
					$max = $t2;
					$min = $t1;			
					$auxMax = $arreglo2;
					$auxMin = $arreglo1;
				}else{
					$max = $t1;
					$min = $t1;
					$auxMax = $arreglo1;
					$auxMin = $arreglo2;
				}
				for($i=0; $i<$max; $i++){
					for($j=0; $j<$min; $j++){
						if($auxMax[$i] ==  $auxMin[$j]){//Entra si los elementos son iguales 
							if($k>0){//Verifica si ya hay elementos agregados al conjunto interseccion
								for($l=0; $l < $k; $l++){											
									if($res[$l]!= $auxMax[$i]){//Verifica que el elemento no este en el conjunto interseccion
										$band= 1;
									}else{
										$band=0;
									}
								}
								if($band==1){//Si no esta en la interseccion entonces lo agrega
									$res[$k] =  $auxMax[$i];
									$k += 1;								
									$bres = 1;
								}
							}
							else if($k==0){//Si no hay elementos en la interseccion, agrega el primero
								$res[$k] =  $auxMax[$i];
								$k += 1;								
								$bres = 1;
							}						
							
						}
					}
				}				
				if($bres==1){//Si se encontraron elementos en comun regresa el conjunto interseccion
					return $res;
				}else{//Si no devuelve falso
					return false;
				}
				
			//}			

		}

		public function setTam($t){
			$this->tam = $t;
		}

		public function getTam(){
			return $this->tam;
		}

		public function getA(){
			return $this->array;
		}

		public function setA($a){
			$this->array = $a;
		}
	}
?>