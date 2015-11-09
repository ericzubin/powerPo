<?php
// Iniciamos la sesion
session_start();

// Valida la sesion
function validaSesion() {
	if(!sesionActiva()) {
		cerrarSesion();
	}
}

function sesionActiva() {
	$_bolEstadoActivo = false;
	$_intUltimoAcceso = obtenerUltimoAcceso();
	/*
	Se establece en segundos cuanto tiempo dura la sesion sin actividad a 10 minutos = 600
	*/
	$_intLimiteUltimoAcceso = $_intUltimoAcceso + 600;
	/*
	Se compara el ultimo acceso del usuario,
	mas 10 minutos de gracia que se otorga para mantener activa
	la sesion, si es mayor a la marca de hora actual, significa entonces
	que la sesión puede seguir activa. Entonces, se actualiza la marca
	de tiempo, renovandole la sesion
	*/
	if($_intLimiteUltimoAcceso > time()) {
		$_bolEstadoActivo = true;
		// Actualizamos la marca de tiempo renovando la sesion
		$_SESSION['fecha_ingreso'] = time();
	}
	return $_bolEstadoActivo;
}

/*
Verificamos que la variable de sesion fecha_ingreso, exista. De ser así, 
obtenemos su valor y lo retornamos. Si no existe, retornara el entero 0
*/

function obtenerUltimoAcceso() {
	$_intUltimoAcceso = 0;
	if(isset($_SESSION['fecha_ingreso'])) {
		$_intUltimoAcceso = $_SESSION['fecha_ingreso'];
	}
	return $_intUltimoAcceso;
}

// Destruye y cierra la sesion del usuario
function cerrarSesion() {
	unset($_SESSION);
	$_arrDatosCookie = session_get_cookie_params();
	setcookie(session_name(), NULL, time()-999999, $_arrDatosCookie["path"],
	$_arrDatosCookie["domain"], $_arrDatosCookie["secure"],
	$_arrDatosCookie["httponly"]);
	session_destroy();
	header("Location: index.php");
}	
?>