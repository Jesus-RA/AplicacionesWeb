<?php
   require('fpdf16/fpdf.php');
   $pdf=new FPDF();	
   $pdf->AddPage();	//Agregar una pagina
   $pdf->SetFont('Arial','B',20);	//Letra Arial, negrita (Bold), tam. 20
   $pdf->Cell(80,40,'Ejemplo de pdf');
   
	//Nombre del archivo de salida
   $pdf->Output("Archivo1.pdf");
   echo "<br>Se ha generado el pdf";
?>
