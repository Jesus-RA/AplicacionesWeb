<?php
	$cliente= $_REQUEST['cliente'];	
	$link= mysqli_connect("localhost","root","");
	mysqli_select_db($link, "videoteca") ; 
	$result= mysqli_query($link, "select * from pelicula where id_pelicula IN (select id_pelicula from rentas where id_cliente = $cliente )");	
	if(mysqli_num_rows($result) > 1){
		echo "<table style='width:30%' border> ";
		echo "<tr>";
		echo "<th>Titulo</th> <th>Director</th> <th>Actor</th>";
		echo "</tr>";
		while($row=mysqli_fetch_array($result)){		
			$titulo= $row['titulo'];
			$director= $row['director'];
			$actor= $row['actor'];
			echo "<tr>";
			echo "<td>$titulo</td> <td>$director</td> <td>$actor</td> <br>";		
			echo "</tr>";
		}
		echo "</table>";
	}else{
		//echo "No hay peliculas rentadas aun<br>";
		//echo "<script>alert('No hay peliculas rentadas');</script>";
		echo "<script type='text/javascript'>";
		echo "alert('No hay peliculas rentadas');";
	    echo "window.history.back(-1)";
	    echo "</script>";

	}
	mysqli_close($link);
?>