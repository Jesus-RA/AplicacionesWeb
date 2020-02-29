	<!DOCTYPE html>
<html>
	<head>
		<title>Conjuntos</title>
	</head>
	<body>
		<!--<div style="background-color:lightpink">-->
			<form method="POST" id="a">

			<select name="conjunto">
				<option value="C1" selected> Conjunto 1
				<option value="C2"> Conjunto 2
			</select>
			<br><br>
									
			<input type="submit" name="Agregar" value="Agregar elemento"> 
			<input type="submit" name="Eliminar" value="Eliminar elemento">
			<input type="submit" name="Union" value="Union"> 
			<input type="submit" name="Interseccion" value="Intersección">				
			
			</form>
		<!--</div> -->
		<form action="generaPDFC.php" method="POST" id="pdf">
			<input type="image" src="pdf.png" alt="Submit" width="48" height="48">				
		</form>

		<form action="graficaC.php" method="POST" id="grafica">
			<input type="submit" name="graficar" value="Graficar">
		</form>
		<hr>

		<div>
			<?php
				require_once "conjunto.php";		
				$c3 = null;
				$c4 = null;
				$band = 0;
				$in = 0;
				$u=0;

				function showC($set){
					$set->mostrarConjunto("Conjunto");
				}				

				if(isset($_REQUEST['sizeA'])){						
					$sizeA = $_REQUEST['sizeA'];
					$sizeB = $_REQUEST['sizeB'];
					$c1 = new Conjunto($sizeA);
					$c2 = new Conjunto($sizeB);

					$c1->mostrarConjunto("Conjunto 1");
					$c2->mostrarConjunto("Conjunto 2");

					//Inicia el envio de datos
					$tamC1 = $c1->getTam();
					$tamC2 = $c2->getTam();
					echo "<input type='hidden' name='tamC1' value='$tamC1' form='a'>";//Envio de datos al formulario para mantenerlos al hacer clic en los 
					$r = $c1->getA();												//botones
					for($i=0; $i<$tamC1; $i++){
						echo "<input type='hidden' name='aC1[]' value='$r[$i]' form='a'>";
					}
					echo "<input type='hidden' name='tamC2' value='$tamC2' form='a'>";
					$r2 = $c2->getA();
					for($i=0; $i<$tamC2; $i++){
						echo "<input type='hidden' name='aC2[]' value='$r2[$i]' form='a'>";
					}			
					if($c3 != null){
						$tamC3 = $c3->getTam();
						echo "<input type='hidden' name='tamC3' value='$tamC3' form='a'>";
						$r3 = $c1->getA();							
						for($i=0; $i<$tamC3; $i++){
							echo "<input type='hidden' name='aC3[]' value='$r3[$i]' form='a'>";
						}
						$b3 = 1;
						echo "<input type='hidden' name='b3' value='$b3' form='a'>";
					}else{
						$b3 = 0;
						echo "<input type='hidden' name='b3' value='$b3' form='a'>";
					}

					if($c4 != null){
						$tamC4 = $c4->getTam();
						echo "<input type='hidden' name='tamC4' value='$tamC4' form='a'>";
						$r4 = $c4->getA();															
						for($i=0; $i<$tamC4; $i++){
							echo "<input type='hidden' name='aC4[]' value='$r4[$i]' form='a'>";
						}
						$b4 = 1;
						echo "<input type='hidden' name='b4' value='$b4' form='a'>";
					}else{
						$b4 = 0;
						echo "<input type='hidden' name='b4' value='$b4' form='a'>";
					}		
					//Finaliza el envio de datos


					//Inicio de envia datos para guardar en PDF
					$tamC1 = $c1->getTam();
					$tamC2 = $c2->getTam();
					echo "<input type='hidden' name='tamC1' value='$tamC1' form='pdf'>";
					//Envio de datos al formulario para mantenerlos al hacer clic en los botones
					$r = $c1->getA();															
					for($i=0; $i<$tamC1; $i++){
						echo "<input type='hidden' name='aC1[]' value='$r[$i]' form='pdf'>";
					}
					echo "<input type='hidden' name='tamC2' value='$tamC2' form='pdf'>";
					$r2 = $c2->getA();
					for($i=0; $i<$tamC2; $i++){
						echo "<input type='hidden' name='aC2[]' value='$r2[$i]' form='pdf'>";
					}				
					if($c3 != null){
						$tamC3 = $c3->getTam();
						echo "<input type='hidden' name='tamC3' value='$tamC3' form='pdf'>";
						$r3 = $c1->getA();							
						for($i=0; $i<$tamC3; $i++){
							echo "<input type='hidden' name='aC3[]' value='$r3[$i]' form='pdf'>";
						}
						$b3 = 1;
						echo "<input type='hidden' name='b3' value='$b3' form='pdf'>";
					}else{
						$b3 = 0;
						echo "<input type='hidden' name='b3' value='$b3' form='pdf'>";
					}

					if($c4 != null){
						$tamC4 = $c4->getTam();
						echo "<input type='hidden' name='tamC4' value='$tamC4' form='pdf'>";
						$r4 = $c4->getA();															
						for($i=0; $i<$tamC4; $i++){
							echo "<input type='hidden' name='aC4[]' value='$r4[$i]' form='pdf'>";
						}
						$b4 = 1;
						echo "<input type='hidden' name='b4' value='$b4' form='pdf'>";
					}else{
						$b4 = 0;
						echo "<input type='hidden' name='b4' value='$b4' form='pdf'>";
					}
					//Fin de envia datos para guardar en PDF

					//Inicio envio de datos para graficar
					$tamC1 = $c1->getTam();
					$tamC2 = $c2->getTam();
					echo "<input type='hidden' name='tamC1' value='$tamC1' form='grafica'>";//Envio de datos al formulario para mantenerlos al hacer clic en los botones
					$r = $c1->getA();															
					for($i=0; $i<$tamC1; $i++){
						echo "<input type='hidden' name='aC1[]' value='$r[$i]' form='grafica'>";
					}
					echo "<input type='hidden' name='tamC2' value='$tamC2' form='grafica'>";
					$r2 = $c2->getA();
					for($i=0; $i<$tamC2; $i++){
						echo "<input type='hidden' name='aC2[]' value='$r2[$i]' form='grafica'>";
					}				
					if($c3 != null){
						$tamC3 = $c3->getTam();
						echo "<input type='hidden' name='tamC3' value='$tamC3' form='grafica'>";
						$r3 = $c1->getA();															
						for($i=0; $i<$tamC3; $i++){
							echo "<input type='hidden' name='aC3[]' value='$r3[$i]' form='grafica'>";
						}
						$b3 = 1;
						echo "<input type='hidden' name='b3' value='$b3' form='grafica'>";
					}else{
						$b3 = 0;
						echo "<input type='hidden' name='b3' value='$b3' form='grafica'>";
					}

					if($c4 != null){
						$tamC4 = $c4->getTam();
						echo "<input type='hidden' name='tamC4' value='$tamC4' form='grafica'>";
						$r4 = $c4->getA();															
						for($i=0; $i<$tamC4; $i++){
							echo "<input type='hidden' name='aC4[]' value='$r4[$i]' form='grafica'>";
						}
						$b4 = 1;
						echo "<input type='hidden' name='b4' value='$b4' form='grafica'>";
					}else{
						$b4 = 0;
						echo "<input type='hidden' name='b4' value='$b4' form='grafica'>";
					}
					//Fin de envio de datos para graficar
				}
				else if(isset($_REQUEST['tamC1'])){
					$b3 = $_REQUEST['b3'];
					$b4 = $_REQUEST['b4'];
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

					$c1 = new Conjunto($t);				//ahora debo de realizar todas las operaciones que necesito debemos depurar el codigo									

					$c1->setTam($t);
					$c1->setA($a);

					$c2 = new Conjunto($t2);					
					$c2->setTam($t2);
					$c2->setA($a2);			

					//Muestra conjunto intereseccion y union
						//-----------
					if($_REQUEST['b3'] == 1){						
						$t3 = $_REQUEST['tamC3'];						
						if($t3 == 0){
							$a3 = 0;
							$c3 = new Conjunto($t3);
							$in=1;		
						}else{
							$a3 = $_REQUEST['aC3'];				//ME quede enviando el tamaño y arreglo del objeto de la clase conjunto para poder instanciar un 							
							$c3 = new Conjunto($t3);
							$c3->setTam($t3);
							if($a3==0){
								$in =0;	
							}else{							
								$c3->setA($a3);		
								$in=1;
							}
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
					//

					//Agrega un elemento al conjunto seleccionado
					if(isset($_POST['Agregar']) || isset($_POST['add'])){						
						$c = $_REQUEST['conjunto'];

						if(isset($_POST['add'])){
							$band = $_REQUEST['band'];							
						}

						switch ($c) {
							case 'C1':
								if($band==1){
									$e = $_REQUEST['elemento'];									
									$c1->agregarElemento($e);									
								}
								else{
									echo "<br>Ingrese el número a agregar: <input type='text' name='elemento' form='a'>";
									echo "&nbsp <input type='submit' name='add' value='Agregar' form='a'>";									
									$band =	1;
									echo "<input type='hidden' name='band' value='$band' form='a'>";
								}								

								break;

							case 'C2':
								if($band==1){
									$e = $_REQUEST['elemento'];									
									$c2->agregarElemento($e);									
								}
								else{
									echo "<br>Ingrese el número a agregar: <input type='text' name='elemento' form='a'>";
									echo "&nbsp <input type='submit' name='add' value='Agregar' form='a'>";
									$band =	1;
									echo "<input type='hidden' name='band' value='$band' form='a'>";
								}		
								break;

							default:
								echo "No se ha seleccionado un conjunto";
								break;
						}
						
					}

					//Eliminar un elemento del conjunto
					if(isset($_POST['Eliminar']) || isset($_POST['delete'])){
						$c = $_REQUEST['conjunto'];

						if(isset($_POST['delete'])){							
							$band = $_REQUEST['band'];							
						}

						switch ($c) {
							case 'C1':
								if($band == 1){
									$e = $_REQUEST['elemento'];
									$c1->eliminarElemento($e);									
								}
								else{
									//$c1->mostrarConjunto("Conjunto 1");
									echo "<br>Elemento a eliminar: <input type='text' name='elemento' form='a' >";	
									$band =	1;
									echo "<input type='hidden' name='band' value='$band' form='a'>";
									echo "&nbsp <input type='submit' name='delete' value='Eliminar' form='a'>";
								}
								
								break;
							
							case 'C2':
								if($band == 1){
									$e = $_REQUEST['elemento'];
									$c2->eliminarElemento($e);									
								}
								else{									
									echo "Elemento a eliminar: <input type='text' name='elemento' form='a'>";	
									$band =	1;
									echo "<input type='hidden' name='band' value='$band' form='a'>";
									echo "&nbsp <input type='submit' name='delete' value='Eliminar' form='a'>";
								}								
								break;

							default:
								echo "No se ha seleccionado un conjunto";
								break;
						}						
					}

					//Union de los conjuntos
					if(isset($_POST['Union'])){
						$b4=1;
						$union = $c1->union($c1->getA(), $c2->getA());
						if($union != false){
							$tamU = count($union);						
							$c4 = new Conjunto($tamU);
							$c4->setTam($tamU);
							$c4->setA($union);
							$c4->mostrarConjunto("Unión");
						}
					}

					//Intereseccion de los conjuntos
					if(isset($_POST['Interseccion'])){
						$b3 =1;
						if($c1->getTam() == 0 && $c2->getTam() == 0){//Si los conjuntos estan vacios manda una alerta 
							echo "<script>
								alert('Conjuntos vacios.');
							  </script>";
							$b3=0;
						}
						else if($c1->getTam() == 0){
							$tamC3 = 0;							
							$c3 = new Conjunto($tamC3);
							$c3->mostrarConjunto("Interseccion");
						}else if($c2->getTam() == 0){
							$tamC3 = 0;							
							$c3 = new Conjunto($tamC3);							
							$c3->mostrarConjunto("Interseccion");	
						}else{
							$a3 = $c1->interseccion($c1->getA(), $c2->getA());
							if($a3 != false){
								$tamC3 = count($a3);							
								$c3 = new Conjunto($tamC3);
								$c3->setTam($tamC3);
								$c3->setA($a3);							
								$c3->mostrarConjunto("Interseccion");									
							}else if(($c1->getTam() && $c2->getTam())){
								$tamC3 = 0;							
								$c3 = new Conjunto($tamC3);
								$c3->mostrarConjunto("Interseccion");
								$in = 1;
							}
						}
						
					}
					
					//Muestra el conjunto seleccionado
					echo "<br>";
					$c1->mostrarConjunto("Conjunto 1");
					$c2->mostrarConjunto("Conjunto 2");		
					if($in == 1){
						$c3->mostrarConjunto("Interseccion");
					}
					if($u == 1){
						$c4->mostrarConjunto("Union");
					}				

					//Inicia el envio de datos
					$tamC1 = $c1->getTam();
					$tamC2 = $c2->getTam();
					echo "<input type='hidden' name='tamC1' value='$tamC1' form='a'>";//Envio de datos al formulario para mantenerlos al hacer clic en los botones
					$r = $c1->getA();															
					for($i=0; $i<$tamC1; $i++){
						echo "<input type='hidden' name='aC1[]' value='$r[$i]' form='a'>";
					}
					echo "<input type='hidden' name='tamC2' value='$tamC2' form='a'>";
					$r2 = $c2->getA();
					for($i=0; $i<$tamC2; $i++){
						echo "<input type='hidden' name='aC2[]' value='$r2[$i]' form='a'>";
					}							

					//Intereseccion y union tengo que modificar para que lo envie a este mismo form
					if($c3 != null){
						$tamC3 = $c3->getTam();
						echo "<input type='hidden' name='tamC3' value='$tamC3' form='a'>"; //enviar a formulario a
						$r3 = $c3->getA();							
						for($i=0; $i<$tamC3; $i++){
							echo "<input type='hidden' name='aC3[]' value='$r3[$i]' form='a'>";
						}
						$b3 = 1;
						echo "<input type='hidden' name='b3' value='$b3' form='a'>";
					}else{
						$b3 = 0;
						echo "<input type='hidden' name='b3' value='$b3' form='a'>";
					}					

					if($c4 != null){
						$tamC4 = $c4->getTam();
						echo "<input type='hidden' name='tamC4' value='$tamC4' form='a'>";
						$r4 = $c4->getA();															
						for($i=0; $i<$tamC4; $i++){
							echo "<input type='hidden' name='aC4[]' value='$r4[$i]' form='a'>";
						}
						$b4 = 1;
						echo "<input type='hidden' name='b4' value='$b4' form='a'>";
					}else{
						$b4 = 0;
						echo "<input type='hidden' name='b4' value='$b4' form='a'>";
					}					
					//Finaliza envio de interseccion y union

					//Finaliza el envio de datos

					//Inicio de envia datos para guardar en PDF

					//echo "<input type='hidden' name='bpdf' value='$bpdf' form='pdf'>";
					$tamC1 = $c1->getTam();
					$tamC2 = $c2->getTam();
					echo "<input type='hidden' name='tamC1' value='$tamC1' form='pdf'>";//Envio de datos al formulario para mantenerlos al hacer clic en los botones
					$r = $c1->getA();															
					for($i=0; $i<$tamC1; $i++){
						echo "<input type='hidden' name='aC1[]' value='$r[$i]' form='pdf'>";
					}
					echo "<input type='hidden' name='tamC2' value='$tamC2' form='pdf'>";
					$r2 = $c2->getA();
					for($i=0; $i<$tamC2; $i++){
						echo "<input type='hidden' name='aC2[]' value='$r2[$i]' form='pdf'>";
					}				
					if($c3 != null){
						$tamC3 = $c3->getTam();
						echo "<input type='hidden' name='tamC3' value='$tamC3' form='pdf'>";
						$r3 = $c1->getA();															
						for($i=0; $i<$tamC3; $i++){
							echo "<input type='hidden' name='aC3[]' value='$r3[$i]' form='pdf'>";
						}
						$b3 = 1;
						echo "<input type='hidden' name='b3' value='$b3' form='pdf'>";
					}else{
						$b3 = 0;
						echo "<input type='hidden' name='b3' value='$b3' form='pdf'>";
					}

					if($c4 != null){
						$tamC4 = $c4->getTam();
						echo "<input type='hidden' name='tamC4' value='$tamC4' form='pdf'>";
						$r4 = $c4->getA();															
						for($i=0; $i<$tamC4; $i++){
							echo "<input type='hidden' name='aC4[]' value='$r4[$i]' form='pdf'>";
						}
						$b4 = 1;
						echo "<input type='hidden' name='b4' value='$b4' form='pdf'>";
					}else{
						$b4 = 0;
						echo "<input type='hidden' name='b4' value='$b4' form='pdf'>";
					}
					//Fin de envia datos para guardar en PDF

					//Inicio envio de datos para graficar
					$tamC1 = $c1->getTam();
					$tamC2 = $c2->getTam();
					echo "<input type='hidden' name='tamC1' value='$tamC1' form='grafica'>";//Envio de datos al formulario para mantenerlos al hacer clic en los botones
					$r = $c1->getA();															
					for($i=0; $i<$tamC1; $i++){
						echo "<input type='hidden' name='aC1[]' value='$r[$i]' form='grafica'>";
					}
					echo "<input type='hidden' name='tamC2' value='$tamC2' form='grafica'>";
					$r2 = $c2->getA();
					for($i=0; $i<$tamC2; $i++){
						echo "<input type='hidden' name='aC2[]' value='$r2[$i]' form='grafica'>";
					}				
					if($c3 != null){
						$tamC3 = $c3->getTam();
						echo "<input type='hidden' name='tamC3' value='$tamC3' form='grafica'>";
						$r3 = $c3->getA();															
						for($i=0; $i<$tamC3; $i++){
							echo "<input type='hidden' name='aC3[]' value='$r3[$i]' form='grafica'>";
						}
						$b3 = 1;
						echo "<input type='hidden' name='b3' value='$b3' form='grafica'>";
					}else{
						$b3 = 0;
						echo "<input type='hidden' name='b3' value='$b3' form='grafica'>";
					}

					if($c4 != null){
						$tamC4 = $c4->getTam();
						echo "<input type='hidden' name='tamC4' value='$tamC4' form='grafica'>";
						$r4 = $c4->getA();															
						for($i=0; $i<$tamC4; $i++){
							echo "<input type='hidden' name='aC4[]' value='$r4[$i]' form='grafica'>";
						}
						$b4 = 1;
						echo "<input type='hidden' name='b4' value='$b4' form='grafica'>";
					}else{
						$b4 = 0;
						echo "<input type='hidden' name='b4' value='$b4' form='grafica'>";
					}
					//Fin de envio de datos para graficar
					
				}
				
			?>

		</div>		
		<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		<hr>
		<footer>
			<form action="formConjuntos.php" method="POST">
				<br><br><br>
				<input type="submit" name="Regresar" value="Regresar">
			</form>
		</footer>

	</body>
</html>