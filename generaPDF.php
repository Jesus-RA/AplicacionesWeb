<?php
   require('fpdf16/fpdf.php');
   $pdf=new FPDF();	
   $pdf->AddPage();	//Agregar una pagina
   $pdf->SetFont('Arial','B',20);	//Letra Arial, negrita (Bold), tam. 20

   //Lee los datos
		$fp = fopen("datos.txt", "r");//Al igual que en C se abre el archivo con la funcion fopen() recibe por parametro el nombre del arcihvo a abrir y la forma  en que se quiere abrir el archivo, en éste caso lectura
		$suma=0;
		$n=0;
		$posicion = 5;
		while(!feof($fp)){//La funcion feof() comprueba el final de la linea, por consiguiente, mientras no se encuentre el final del archivo se va a leer; recibe por parametro 
			fscanf($fp, "%s %f %s", $nombre, $promedio, $carrera);//Con la funcion fscanf() se lee un archivo			
			$suma += $promedio;
			$posicion += 1;
			$n += 1;					
			$pdf->Cell(60, 10,$nombre.' '.$promedio.' '.$carrera , 0, 1);	
			//El 60 es el ancho de la columna, el 10 es el alto del renglón, el 1 es para dibujar las lineas del renglón y el otro 1 es para cambiar de renglón
			//Para imprimir variables es necesario usar un punto para concatenarlas al texto
			//Se pueden usar comillas simples o dobles
		}
		$promGeneral = $suma/$n;
		$pdf->cell(160,20,"El promedio general es= ".$promGeneral,0,1);		
		fclose($fp);//Cerramos el archivo con la funcion fclose() recibe por parametro la variable en la que se abrió el archivo.
	//Fin lectura de datos   
   
	//Nombre del archivo de salida
   echo "Se generó el archivo Datos.pdf";
   $pdf->Output("Datos.pdf");   
?>
