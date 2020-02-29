<?php
	//if(isset($_REQUEST['bpdf'])){//$t = $_REQUEST['t'];
		//$taste = $_REQUEST['t'];
		//echo "Prueba = $taste <br>";
		require_once "conjunto.php";
		require('fpdf16/fpdf.php');
		error_reporting(0);
			$in=0;
			$u=0;
				$t = $_REQUEST['tamC1'];
					if($t <= 0){
						$a = 0;
					}else{
						$a = $_REQUEST['aC1'];				//ME quede enviando el tamaño y arreglo del objeto de la clase conjunto para poder instanciar un 
					}

					$t2 = $_REQUEST['tamC2'];			//nuevo objeto y agregar lo que ya tenia
					if($t2 <= 0){
						$a2 = 0;
					}else{
						$a2 = $_REQUEST['aC2'];
					}		
					//-----------
					if($_REQUEST['b3'] == 1){						
						$t3 = $_REQUEST['tamC3'];						
						if($t3 <= 0){
							$a3 = 0;							
						}else{
							$a3 = $_REQUEST['aC3'];				//ME quede enviando el tamaño y arreglo del objeto de la clase conjunto para poder instanciar un 							
						}
						$c3 = new Conjunto($t3);					
						$c3->setTam($t3);
						if($a3==0){
							$in =1;
						}else{							
							$c3->setA($a3);	
							$in=1;
						}
						
					}

					if($_REQUEST['b4'] == 1){
						$t4 = $_REQUEST['tamC4'];			//nuevo objeto y agregar lo que ya tenia
						if($t4 == 0){
							$a4 = 0;							
						}else{
							$a4 = $_REQUEST['aC4'];							
							$c4 = new Conjunto($t4);
							$c4->setTam($t4);
							if($a4==0){
								$u =0;
							}else{							
								$c4->setA($a4);
								$u=1;
							}
						}						
						
					}

					$c1 = new Conjunto($t);				//ahora debo de realizar todas las operaciones que necesito debemos depurar el codigo									

					$c1->setTam($t);
					$c1->setA($a);

					$c2 = new Conjunto($t2);					
					$c2->setTam($t2);
					$c2->setA($a2);		

					$c1->mostrarConjunto("Conjunto 1");
					$c2->mostrarConjunto("Conjunto 2");
					if($in == 1)	{
						$c3->mostrarConjunto("Interseccion");
					}
					if($u == 1){
						$c4->mostrarConjunto("Union");
					}

		// --------------- Genera archivo PDF -----------------------			   
			   $pdf=new FPDF();	
			   $pdf->AddPage();	//Agregar una pagina
			   $pdf->SetFont('Arial','B',20);	//Letra Arial, negrita (Bold), tam. 20
			   
				$i=1;
				$a1 = $c1->getA();
				$pdf->cell(45,10,'Conjunto 1 { ',0,0);		
				$pdf->cell(10,10, $a1[0].'',0,0);		
				while($i < $c1->getTam()){
					$pdf->Cell(10, 10, ','.$a1[$i], 0, 0);						
					//El 60 es el ancho de la columna, el 10 es el alto del renglón, el 1 es para dibujar las lineas del renglón y el otro 1 es para cambiar de renglón
					//Para imprimir variables es necesario usar un punto para concatenarlas al texto
					//Se pueden usar comillas simples o dobles
					$i +=1;
				}
				$pdf->cell(10,10,'}',0,1);		
			   
				$i=1;
				$a2 = $c2->getA();
				$pdf->cell(45,10,'Conjunto 2 { ',0,0);		
				$pdf->cell(10,10, $a2[0].'',0,0);		
				while($i < $c2->getTam()){
					$pdf->Cell(10, 10, ','.$a2[$i], 0, 0);						
					//El 60 es el ancho de la columna, el 10 es el alto del renglón, el 1 es para dibujar las lineas del renglón y el otro 1 es para cambiar de renglón
					//Para imprimir variables es necesario usar un punto para concatenarlas al texto
					//Se pueden usar comillas simples o dobles
					$i +=1;
				}
				$pdf->cell(10,10,'}',0,1);		

				if($_REQUEST['b3']==1){
					if($in != 0){
						$i=1;
						$a3 = $c3->getA();
						$pdf->cell(60,10,'Intereseccion { ',0,0);		
						$pdf->cell(10,10, $a3[0].'',0,0);		
						while($i < $c3->getTam()){
							$pdf->Cell(10, 10, ','.$a3[$i], 0, 0);						
							//El 60 es el ancho de la columna, el 10 es el alto del renglón, el 1 es para dibujar las lineas del renglón y el otro 1 es para cambiar de renglón
							//Para imprimir variables es necesario usar un punto para concatenarlas al texto
							//Se pueden usar comillas simples o dobles
							$i +=1;
						}
						$pdf->cell(10,10,'}',0,1);		
					}else{
						$pdf->cell(45,10,'Intereseccion { }',0,0);	
					}
				}

				if($_REQUEST['b4']==1){
					if($u!=0){
						$i=1;
						$a4 = $c4->getA();
						$pdf->cell(30,10,'Union { ',0,0);		
						$pdf->cell(10,10, $a4[0].'',0,0);		
						while($i < $c4->getTam()){
							$pdf->Cell(10, 10, ','.$a4[$i], 0, 0);						
							//El 60 es el ancho de la columna, el 10 es el alto del renglón, el 1 es para dibujar las lineas del renglón y el otro 1 es para cambiar de renglón
							//Para imprimir variables es necesario usar un punto para concatenarlas al texto
							//Se pueden usar comillas simples o dobles
							$i +=1;
						}
						$pdf->cell(10,10,'}',0,1);	
					}else{
						$pdf->cell(45,10,'Union { }',0,0);	
					}	
				}
				//Nombre del archivo de salida
			    echo "Se generó el archivo Datos.pdf";
			    $pdf->Output("Conjuntos.pdf");   

		//----------------- Fin genera archivo PDF ----------------------


	/*}else{
		echo "No puedo recibir el dato <br>";
	}*/
	
?>