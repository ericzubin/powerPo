<?php require_once('funciones/mysql.php'); ?>
<?php
if ( array_key_exists("Ingresar", $_POST) ) {
			
	if ( isset( $_POST['usuario'] ) && isset( $_POST['contrasena'] ) ) {
		$_strUsuario = $_POST['usuario'];	
		$_strContrasena = md5( $_strUsuario . $_POST['contrasena'] );
		$_strSelectUsuario = "SELECT * FROM Usuarios WHERE username = '$_strUsuario' AND passwordUsuario = '$_strContrasena' ";
		$_rsConsultaUsuario = ejecutaSQL( $_strSelectUsuario );
		$_arrDatoUsuario = obtenerDatosConsulta ( $_rsConsultaUsuario );
		
		if( $_arrDatoUsuario['username'] ==  $_POST['usuario'] && $_arrDatoUsuario['passwordUsuario'] == $_strContrasena)
		{
			// Iniciamos la sesion
			session_start();
			$_SESSION['fecha_ingreso'] = time();
			$_SESSION['t01usuario'] = $_arrDatoUsuario;
			header("Location: formularioSubirImagen.php");
		}
		else{
			echo "<center><h3>Usuario y/o ContraseÃ±a Incorrecta</h3></center>";
		}
	}
	
	liberarDatosSelect ( $_rsConsultaUsuario );
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css" integrity="sha384-aUGj/X2zp5rLCbBxumKTCw2Z50WgIr1vs/PFN4praOTvYXWlVyh2UtNUU0KAUhAX" crossorigin="anonymous">

<title>Login</title>
</head>

<body>







<div class="row">
  <div class="col-md-4"></div>

<form  class="col-md-4" id="form1" name="form1"   method="post" action="index.php">
  <div class="form-group">
     <label for="inputUser3" class="col-sm-2 control-label">Usuario</label>
      <input type="text" name="usuario" id="usuario"  class="form-control col-xs-6 col-sm-4" class="form-control"  placeholder="Usuario"/>
 <br/>

  </div>
  <div class="form-group">
     <label for="inputPassword3" class="col-sm-2 control-label">Contrase«Ğa</label>      
<input type="password" class="form-control col-xs-6 col-sm-4" id="contrasena" placeholder="Password" name="contrasena">

  </div>
<br>

  </div>
 <br/>
  <div class="col-md-4"></div>
       <input type="submit" name="Ingresar"  value="Ingresar"  class="btn btn-primary col-md-4"/>

</form>
 <br/>
 <br/>
 <br/>
  <div class="col-md-4"></div>
 
 <p class="col-md-4" >Registrarse<a href="Registarse.php"> aqui</a></p>

</div>

</body>
</html>