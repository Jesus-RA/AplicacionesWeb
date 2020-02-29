<html>	
	<h2>Operaciones para un arreglo</h2>
	<hr>
	<h3>Arreglo</h3>
	<body>		
		<?PHP
			$n= $_REQUEST['size'];
			$a = $_REQUEST['a'];
			$b = $_REQUEST['b'];	
			
			function printArray($array, $n){
				echo "<table border = 1>";
				echo "<TR> <td>Posición</td> <td>Valor</td> </TR>";
				for($i=1;$i<=$n;$i++){
					echo "<TR> <td>$i</td> <td>$array[$i]</td> </TR>";
				}
				echo "</table> <br>";
			}
			
			function insertArray($n,$a,$b){
				for($i=1;$i<=$n;$i++){
					$array[$i]= rand($a,$b);					
				}
				printArray($array,$n);
				return $array;
			}	

			function ordenar($array, $n){
				$aux=0;
				/*for($i=1; $i<$n; $i++){
					if($array[$i] > $array[$i+1]){
						$aux= $array[$i];
						$array[$i]= $array[$i+1];
						$array[$i+1]= $aux;						
					}
				}*/
				for($i=1;$i<$n;$i++){
					for($j=1;$j<$n;$j++){
						if($array[$j]>$array[$j+1]){
							$aux=$array[$j];
							$array[$j]=$array[$j+1];
							$array[$j+1]=$aux;
						}
					}		 
				}
				printArray($array, $n);				
			}
			
			function media($array, $n){
				$aux=0;
				for($i=1; $i<=$n; $i++){
					$aux = $aux + $array[$i];
				}
				$res = $aux/$n;
				echo "<b>La media es $aux/$n = $res </b> <br>";
			}
			
			function moda($array, $n){
				$m=0;
				for($i=1;$i<=$n;$i++){
					$s=0;
					for($j=1;$j<=$n;$j++){
						if($array[$i]==$array[$j] and $i!=$j){
							$s = $s+1;
						}
					}					
					if($s>=$m){
						$m=$s;
						$a=$i;
					}
				}
				echo "<b>La moda es = $array[$a]</b> <br>";
			}										
			
			$arr= insertArray($n, $a, $b);		
			echo "<hr> <b>Arreglo ordenado";			
			ordenar($arr,$n);
			echo "<hr> <br>";			
			media($arr,$n);
			echo "<hr> <br>";			
			moda($arr,$n);
								
		?>					
		
	</body>
</html>