
<html>	
	<head> <title> Factorial </title> </head>
	<body>
		<h2> Factorial de un número </h2>
		<hr>
		<?PHP
			//Función Factorial
			function Factorial($n){ //Para crear una función se usa la palabra reservada "function"
				$f=1;				//Como se puede apreciar no es necesario especificar si va a retornar algún
				echo "<table border =1>";				//tipo de valor
				for($i=1;$i<=$n;$i++){
					$f= $f*$i;
					echo "<TR> <td>$i</td> <td> = </td> <td> $f </td> </TR>";
				}
				return $f;
				echo "</table>";
			}						
			
				
			//Programa principal
			$n = $_REQUEST['numero'];//Recibe un dúmero del formulario formEnviar//rand(1,10) genera un número random;
			$res = Factorial($n);
			echo "El factorial de $n es = $res <br>";			
		?>
	</body>
</html>