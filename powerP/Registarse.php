<?php require_once('funciones/mysql.php'); ?>
<?php
if ( array_key_exists("Registrarse", $_POST) ) {
			
	$_strNombre = $_POST['name'];
	$_strEmail =$_POST['correoU'];
	$_strUsuario = $_POST['username'];
	$_strContrasena = md5( $_POST['username'] . $_POST['password'] );
					   					   
	$_strInsertUsuario = "INSERT INTO Usuarios (nombreUsuario, emailUsuario, username,passwordUsuario) 
	VALUES ('$_strNombre', '$_strEmail', '$_strUsuario', '$_strContrasena');";
	//echo $_strInsertUsuario;				   
	$_intResultadoInsertUsuario = ejecutaSQL ($_strInsertUsuario);
	$estructura = "./img/$_strUsuario/big/";
	$estructura1 = "./img/$_strUsuario/small/";
			header("Location: index.php");


// Para crear una estructura anidada se debe especificar
// el parámetro $recursive en mkdir().

		
	}
	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="Gallery-master/css/estilosRegistrarse.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css" integrity="sha384-aUGj/X2zp5rLCbBxumKTCw2Z50WgIr1vs/PFN4praOTvYXWlVyh2UtNUU0KAUhAX" crossorigin="anonymous">
<title>Formulario</title>
</head>

<body>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>

<div class="row">

  <div class="col-xs-1 col-sm-4"></div>
  <div class="col-xs-1 col-sm-4">
<table style="width:35%">
<div id="formulario" ">
<form id="form1" name="form1" method="post" action="">
 <tr>
<td>Usuario   </td>
 <td><input name="username" type="text" placeholder="Usuario"  class="" /> </td>
 </tr>
 <tr>
<td>Nombre   </td>
 <td><input name="name" type="text" placeholder="Nombre"  class="" /> </td>
 </tr>
 <tr>
<td>Correo   </td>
 <td><input name="correoU" type="email" placeholder="Correo"  class=""/> </td>
 </tr>
 <tr>
<td>Contraseña  </td>
 <td><input name="password" type="password" placeholder="Password"  class="" />  </td>
 </tr>
</table>

<input name="Registrarse" type="submit" value="Registrarse" placeholder="Registrarse" id="boton" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg"" />

</form>
</div>
</div>
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
     Ya estas Registrado
    </div>
  </div>
</div>
</body>
</html>