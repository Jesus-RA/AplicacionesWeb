<html>
	<head> <title> Factorial </title> </head>
	<body>
		<h2> Factorial de un número </h2>
		<hr>
		<?PHP
			$n = rand(1,10);
			$f = 1;
			for($i=1; $i<=$n; $i++){
				$f= $f*$i;
			}
			echo "El factorial de $n es = $f <br>";
		?>
	</body>
</html>