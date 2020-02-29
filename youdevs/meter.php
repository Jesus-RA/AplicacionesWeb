<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	Este es un meter: <br>
	<meter value="0.6"></meter>

	<p>Subo contenido y cursos constantemente</p>
	<progress id="dynamic" max="100" value="0"></progress>
	<script>
		const elem = document.getElementById('dynamic');
		setInterval(()=>{
			elem.value+=1;
			if(elem.value === 100){
				elem.value = 0;
			}
		}, 20);
	</script>
</body>
</html>