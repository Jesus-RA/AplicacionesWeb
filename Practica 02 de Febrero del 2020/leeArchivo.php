<!DOCTYPE html>
<html>
<head>
	<title>Lee un archivo.</title>	
</head>
<body>
	<h2>Lee un archivo</h2>
	<a href="generaPDF"> <img src="pdf.png" width="60" height="60"> </a> <br><br>
	<!--La etiqueta <a> </a> crea una enlace en el formulario. 
		La etiqueta <img> nos ayuda a insertar una imagen, en su atributo src debe ir el nombre de la imagen junto con la extension.
	-->
	<?php		
		$fp = fopen("datos.txt", "r");//Al igual que en C se abre el archivo con la funcion fopen() recibe por parametro el nombre del arcihvo a abrir y la forma  en que se quiere abrir el archivo, en éste caso lectura
		$suma=0;
		$n=0;
		while(!feof($fp)){//La funcion feof() comprueba el final de la linea, por consiguiente, mientras no se encuentre el final del archivo se va a leer; recibe por parametro 
			fscanf($fp, "%s %f %s", $nombre, $promedio, $carrera);//Con la funcion fscanf() se lee un archivo
			//echo "Nombre = $nombre || Promedio= $promedio || Carrera= $carrera <br>";
			echo "$nombre $promedio $carrera <br>";
			$suma += $promedio;
			$n += 1;			
		}
		$promGeneral = $suma/$n;
		echo "Promedio general = $promGeneral";
		fclose($fp);//Cerramos el archivo con la funcion fclose() recibe por parametro la variable en la que se abrió el archivo.
	?>
</body>
</html>