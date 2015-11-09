<?php
	require_once('funciones/mysql.php');
	require_once('funciones/sesiones.php'); 
	validaSesion();
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
<?php require_once("include/menu_arriba.php"); ?>
<body onload="document.form1.reset()">
<form action="procesar.php" method="post" enctype="multipart/form-data" id="form1" name="form1">
<p>
	Archivo 
<input type="file" name="foto" id="textfield" >
</p> 
<p> 
<input type="submit" name="button" id="button" value="Enviar" >
</p>
</form>
