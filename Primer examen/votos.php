<?PHP
	include "libchart/classes/libchart.php";
	error_reporting(E_ALL & ~E_DEPRECATED);
	error_reporting(0);
	//Recibe datos
	$nombre = $_REQUEST['nombre'];
	$voto = $_REQUEST['partido'];	

	//Escribir datos en archivo txt
	$fp = fopen("Votos.txt","a");
	$linea= $nombre." ".$voto."\n";	
	fputs($fp, $linea);
	fclose($fp);

	$PRI = 0;
	$PAN = 0;
	$PRD = 0;
	$MORENA = 0;
	$p[0] = "PRI";
	$p[1] = "PAN";
	$p[2] = "PRD";
	$p[3] = "MORENA";
	$a[0]=0;
	$a[1]=0;
	$a[2]=0;
	$a[3]=0;
	function getVotos($line,$a){
		$token = explode(" ", $line);
		$n = $token[0];
		$v = $token[1];		
		//echo "token = $v<br>";
		$p="PRI";
		if(strcmp($v,"PRI") == 0){
			$a[0] = $a[0]+1;
			//echo "Entre pri";
		}
		if(strcmp($v,"PAN") != 0){
			$a[1] = $a[1]+1;
			//echo "Entre pan";
		}
		if(strcmp($v,"PRD") != 0){
			$a[2] = $a[2]+1;
			//echo "Entre prd";
		}
		if(strcmp($v,"MORENA") != 0){
			$a[3] = $a[3]+1;
			//echo "Entre mor";
		}
		return $a;
	}

	//Graficar datos
	$chart = new VerticalBarChart(600,200);
	$data = new XYDataSet();
	$fp= fopen("Votos.txt","r");
	$i = 0;
	while(!feof($fp)){
		//$i =+ 1;
		$l = fgets($fp);
		$token = explode(" ", $l);
		$n = $token[0];
		$v = (string)$token[1];
		if($v == 1){//strcmp($v,"PRI") != 1){
			$a[0] = $a[0]+1;
			///echo "Entre pri";
		}
		if($v == 2){
			$a[1] = $a[1]+1;
			//echo "Entre pan";
		}
		if($v == 3){
			$a[2] = $a[2]+1;
			//echo "Entre prd";
		}
		if($v == 4){
			$a[3] = $a[3]+1;
			//echo "Entre mor";
		}
		//$data->addPoint(new Point("$p","$i"));
		//$array = getVotos($l, $a);
		
		//echo "$l <br>";
	}
	for($i=0; $i< count($a); $i++){
		//echo "$array[$i]<br>";
		//echo "$a[$i]<br>";
		$data->addPoint(new Point("$p[$i]","$a[$i]"));
	}
	$chart->setDataSet($data);
	$chart->getPlot()->setGraphPadding(new Padding(5,20,20,170));
	$chart->setTitle("Votos");
	$chart->render("generated/votos.png");
	echo "<img src='generated/votos.png'>";
	fclose($fp);

?>