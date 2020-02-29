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
		include "libchart/classes/libchart.php";//Se incluye la libreria
		//$chart = new LineChart(600,200);
		$chart = new HorizontalBarChart(600,200);//Crea el tipo de grafica
		//LineChart crea una grafica de linea y HorizontalBarChart crea una grafica de barras 
		$data = new XYDataSet();//Crea el contenedor de los datos		

		$fp = fopen("datos.txt", "r");//Al igual que en C se abre el archivo con la funcion fopen() recibe por parametro el nombre del arcihvo a abrir y la forma  en que se quiere abrir el archivo, en éste caso lectura		
		$fp1 = fopen("salida.txt", "a");
		while(!feof($fp)){//La funcion feof() comprueba el final de la linea, por consiguiente, mientras no se encuentre el final del archivo se va a leer; recibe por parametro			
			$linea = fgets($fp);//fgets obtiene toda una linea del archivo
			$token = explode(" ", $linea);//La funcion explode obtiene cada dato separada por el token especificado en el primer parametro entre comillas dobles
			$nom = $token[0];
			$edad = $token[3];
			echo "$nom $edad <br>";			
			//echo "$token[0] <br> $token[3]<br>";
			//echo "$linea <br>";
			fputs($fp1, $linea);//Escribe una cadena en un archivo primer parametro variable del archivo destino y segundo parametro la cadena a escribir.			
			$data->addPoint(new Point("$nom", "$edad"));
		}
		fputs($fp1, "\n");
		fclose($fp);//Cerramos el archivo con la funcion fclose() recibe por parametro la variable en la que se abrió el archivo.
		fclose($fp1);
		$chart->setDataSet($data);//Agrega los datos a la grafica
		$chart->getPlot()->setGraphPadding(new Padding(5,20,20,170));//Dibuja la grafica 
		$chart->setTitle("Edades de alumnos");//Se asigna un titulo a la grafica
		$chart->render("generated/grafica1.png");//Se guarda la grafica en la carpeta generated con el nombre grafica1 y extension png

	?>
	<img src="generated/grafica1.png">
</body>
</html>