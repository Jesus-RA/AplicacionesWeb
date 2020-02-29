<?php
	include "libchart/classes/libchart.php";

	$chart= new PieChart(1000,600);
	$data= new XYDataSet();

	$link= mysqli_connect("localhost","root","");
	mysqli_select_db($link,"videoteca");
	$result= mysqli_query($link, "select titulo, ranking from pelicula;");	
	while($row=mysqli_fetch_array($result)){
		$t= $row['titulo'];
		$r = $row['ranking'];				
		$data->addPoint(new Point("$t","$r"));
	}
	mysqli_close($link);
	$chart->setDataSet($data);
	//$chart->getPlot()setGraphPadding(new Padding(5,20,20,170));
	$chart->setTitle("Ranking");
	$chart->render("misImagenes/ranking.png");

?>
<img src="misImagenes/ranking.png">