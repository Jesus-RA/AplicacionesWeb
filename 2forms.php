<!DOCTYPE html>
<html>
<head>
	<title>Ejemplo dos form</title>
</head>
<body>
	<div>
	<form method="POST">
		a: <input type="text" name="A" required> <br><br>
		<input type="submit" name="EnviarA" value="Enviar"> <br><br>
	</form>
	</div>
		
		<?php			
			echo "<script>
					alert('Nel prro');
				  </script>";
			if(isset($_POST['EnviarA'])){
				$a = $_REQUEST['A'];
				$b = $_REQUEST['B'];
				$sum = $a + $b;
				echo "$a + $b= $sum <br>";
				$c = 0;
				for($i=0; $i<4; $i++){
					echo "$c<br>";
					$c += 1;
					$a[$i]=$c;
					echo "$a[$i]<br>";
				}
				echo "Tam a ",count($a);
				//alert('a');
			}			
		?>
	<div>
		<form method="POST">
			b: <input type="text" name="B" required>	<br><br>
			<!-- <input type="submit" name="EnviarB" value="Enviar"><br><br> -->
		</form>
	</div>
</body>
</html>