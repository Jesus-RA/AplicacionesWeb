<!DOCTYPE html>
<html>
<head>
	<title> POO</title>
</head>
<body>
	<h2> Clase rectangulo </h2>	
	<?PHP
		require_once "rectangulo.php";//Para utilizar una clase en PHP se debe poner la palabra reservada "require_once" espacio y el nombre de la clase entre
		/*$R1 = new Rectangulo(10,5);//comillas junto con su extension.
		$R2 = new Rectangulo(4,7);//Para instanciar un objeto de una clase en PHP se utiliza la palbra new y el nombre de la clase
		//en caso de haber creado un constructor se deben de pasar los parametros deseados.

		$R1->escribir("Rectangulo 1");//Para mandar a llamar los metos de una clase en PHP se debe utilizar "->".
		$R2->escribir("Rectangulo 2");

		$areaR1 = $R1->area();
		$perR2 = $R2->perimetro();

		echo "El area del rectangulo 1 = $areaR1 <br>";
		echo "El perimetro del rectangulo 2 = $perR2 <br>";*/

		$base = $_REQUEST['base'];
		$altura = $_REQUEST['altura'];

		$R = new Rectangulo($base,$altura);		
		$R->escribir("Rectangulo");
		$area = $R->area();
		$perimetro = $R->perimetro();

		echo "<hr>";
		echo "Area = $area <br>";
		echo "Perimetro = $perimetro <br>";
	?>
</body>
</html>