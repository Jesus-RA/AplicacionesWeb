<?php
	if($_REQUEST['nombre']){
		$nombre = $_REQUEST['nombre'];
		$estado = $_REQUEST['estado'];
		$deportes = $_REQUEST['deportes'];

		echo "Nombre: $nombre<br>";
		echo "Estado: $estado<br>";
		$t = count($deportes);
		echo "Deportes <br>";
		for($i=0; $i<$t; $i++){
			echo "$deportes[$i]<br>";
		}
	}
?>