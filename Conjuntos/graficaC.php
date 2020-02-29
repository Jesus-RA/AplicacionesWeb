<?php
	include "libchart/classes/libchart.php";
	require_once "conjunto.php";
	$chart1 = new VerticalBarChart(600,200);
	$chart2 = new VerticalBarChart(600,200);
	$chart3 = new VerticalBarChart(600,200);
	$chart4 = new VerticalBarChart(600,200);
	$data1 = new XYDataSet();
	$data2 = new XYDataSet();
	$data3 = new XYDataSet();
	$data4 = new XYDataSet();
	error_reporting(0);
	$t = $_REQUEST['tamC1'];
	if($t <= 0){
		$a = 0;
	}else{
		$a = $_REQUEST['aC1'];
		$ca = 1;
	}

	$t2 = $_REQUEST['tamC2'];
	if($t2 <= 0){
		$a2 = 0;
	}else{
		$a2 = $_REQUEST['aC2'];
		$cb=1;
	}			
	if($_REQUEST['b3'] == 1){						
		$t3 = $_REQUEST['tamC3'];						
		if($t3 <= 0){
			$a3 = 0;							
		}else{
			$a3 = $_REQUEST['aC3'];
		}
		$c3 = new Conjunto($t3);				
		$c3->setTam($t3);
		echo "$a3[0]";
		if($a3==0){
			$in =1;
		}else{							
			$c3->setA($a3);	
			$in=1;
		}
		
	}else{
		$in=0;
		$c3 = new Conjunto(0);
	}

	if($_REQUEST['b4'] == 1){
		$t4 = $_REQUEST['tamC4'];
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
		
	}else{
		$c4 = new Conjunto(0);
		$u=0;
	}

	$c1 = new Conjunto($t);
	$c1->setTam($t);
	$c1->setA($a);
 	if($c1->getTam()!=0){
 		$a = $c1->getA();
 		for($i=0; $i<$c1->getTam(); $i++){
 			$data1->addPoint(new Point("$i","$a[$i]"));
 		}
 		$chart1->setDataSet($data1);
 		$chart1->getPlot()->setGraphPadding(new Padding(5,20,20,170));
 		$chart1->setTitle("Conjunto 1");
 		$chart1->render("generated/conjunto1.png");
 		echo "<img src='generated/conjunto1.png'>";
 	}

	$c2 = new Conjunto($t2);					
	$c2->setTam($t2);
	$c2->setA($a2);
	if($c2->getTam()!=0){
		$a2 = $c2->getA();
 		for($i=0; $i<$c2->getTam(); $i++){
 			$data2->addPoint(new Point("$i","$a2[$i]"));
 		}
 		$chart2->setDataSet($data2);
 		$chart2->getPlot()->setGraphPadding(new Padding(5,20,20,170));
 		$chart2->setTitle("Conjunto 2");
 		$chart2->render("generated/conjunto2.png"); 		
 		echo "<img src='generated/conjunto2.png'>";
	}

	//$c1->mostrarConjunto("Conjunto 1");
	//$c2->mostrarConjunto("Conjunto 2");
	if($c3->getTam() != 0){
		$a3 = $c3->getA();
		for($i=0; $i<$c3->getTam(); $i++){
			$data3->addPoint(new Point("$i","$a3[$i]"));
		}
		$chart3->setDataSet($data3);
		$chart3->getPlot()->setGraphPadding(new Padding(5,20,20,170));
		$chart3->setTitle("Interseccion");
		$chart3->render("generated/interseccion.png");		
		echo "<img src='generated/interseccion.png'>";
		//$c3->mostrarConjunto("Interseccion");
	}
	if($u == 1){
		$a4 = $c4->getA();
 		for($i=0; $i<$c4->getTam(); $i++){
 			$data4->addPoint(new Point("$i","$a4[$i]"));
 		}
 		$chart4->setDataSet($data4);
 		$chart4->getPlot()->setGraphPadding(new Padding(5,20,20,170));
 		$chart4->setTitle("Union");
 		$chart4->render("generated/union.png");
		//$c4->mostrarConjunto("Union");
		echo "<img src='generated/union.png'>";
	}
?>