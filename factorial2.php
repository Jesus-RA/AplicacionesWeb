<html>
	<head> <title> Factorial </title> </head>
	<body>
		<h2> Factorial de un número </h2>
		<hr>
		<?php
			//Con factorial2.php se manda al mismo programa!
			if (isset($_POST['enviar'])){

				function Factorial($n){ 
					$f=1;									
					for($i=1;$i<=$n;$i++){
						$f= $f*$i;						
					}
					return $f;					
				}	
				$n = $_REQUEST['numero'];
				$res = Factorial($n);					
				echo "<br> El factorial de $n es = $res <br>";
			}
			//Con la palabra required no dejará enviar el formulario sin un valor
		?>
		<form action= "factorial2.php" method= "post" > 
			Introduce un numero : <br>
			<input type ="text" name="numero" required>
			<br><br>
			<input type ="submit" name="enviar" value="Aceptar">
			<hr>
		</form>
	</body>
</html>