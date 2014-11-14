<?php

$subject="Consulta enviada desde Ciudadaniaseuropeas.com por ".$_POST['nombre']." - ".$_POST['ubicacion'];

$headers= "From: ".$_POST['email']."\n";
$headers.='Content-type: text/html; charset=iso-8859-1';

$destinatarios = "info@ciudadaniaseuropeas.com";

mail($destinatarios, $subject,  "
<html>
	<head>
	 	<title>Consulta desde LandingPage</title>
	</head>
	<body>
		<br>Nombre: ".$_POST['nombre']."
		<br>Teléfono: ".$_POST['telefono']."
		<br>Ubicación: ".$_POST['ubicacion']."
		<br>Consulta: ".$_POST['consulta']."
	</body>
</html>" , $headers);

?>
<script>
	document.location.href= "ciudadaniaslandingthnx.html";
</script>