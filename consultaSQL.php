<!DOCTYPE html>
<html>
<head>
	<title>Consulta Videoteca</title>
</head>
<body>
	<h2>Peliculas de la Videoteca</h2>
	<hr>	
	<?php
		$link = mysqli_connect("localhost", "root","");//Se conecta a la base de datos
		mysqli_select_db($link,"videoteca");//Selecciona la base de datos
		//$sql= "select * from pelicula";
		$result= mysqli_query($link,"select * from pelicula");//Realiza la consulta, primer parametro el enlace, segundo la consulta
		echo "<table border='1'>";
		echo "<tr> <th>id Pelicula</th> <th>Pelicula</th> <th>Director</th> <th>Actor</th> <th>Ranking</th> <th>Imagen</th> </tr>";
		while($row=mysqli_fetch_array($result)){
			$id= $row['id_pelicula'];
			$titulo= $row['titulo'];
			$director= $row['director'];
			$actor= $row['actor'];
			$img= $row['imagen'];
			$ranking= $row['ranking'];
			//echo "$id $titulo $director $actor <br>";
			$ruta= "misImagenes/".$img;			
			echo "<tr> <td> $id </td> <td> $titulo </td> <td> $director </td> <td> $actor </td> <td>$ranking</td> <td> <img src= $ruta width='60' height='60'> </td> </tr>";
		}
		echo "</table>";
		mysqli_close($link);		
	?>
	<a href="graficaPeliculas.php">Graficar</a>
</body>
</html>

<!-- Instrucciones SQL de la practica
 use videoteca;
/*describe pelicula;
alter table pelicula add column imagen varchar(64);
describe pelicula;*/
/*update pelicula set imagen = 'imagen1.jpg' where id_pelicula = 1;
update pelicula set imagen = 'imagen2.jpg' where id_pelicula = 2;
update pelicula set imagen = 'imagen3.jpg' where id_pelicula = 3;
update pelicula set imagen = 'imagen4.jpg' where id_pelicula = 4;
update pelicula set imagen = 'imagen5.jpg' where id_pelicula = 5;
update pelicula set imagen = 'imagen6.jpg' where id_pelicula = 6;*/
-- alter table pelicula add column ranking int(3);
 update pelicula set ranking = RAND()*(100-10);
select * from pelicula;

-->