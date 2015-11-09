<?php
// Datos constantes de conexion a la base de datos
define("SERVIDOR" , "localhost");
define("BASEDATOS" , "dtechcom_powerp" );
define("USUARIO", "dtechcom_powerp");
define("CONTRASENA" , "aVh-F&Ff8h]I");

////////////////////////////////////////CONEXION//////////////////////////////////////////////////
// La conexion regresa un objeto de base de datos el cual usamos para seleccionar la base de datos
global $_dbConexion;
$_dbConexion = mysql_pconnect(SERVIDOR, USUARIO, CONTRASENA) or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_select_db( BASEDATOS, $_dbConexion);

////////////////////////////////////////FUNCIONES//////////////////////////////////////////////////
// Ejecuta las sentencias SQL y regresa un recorset o un entero dependiendo de la sencia a ejecutar
function ejecutaSQL ( $_strSQLConsulta ){
	global $_dbConexion;
	$_rsConsulta = mysql_query( $_strSQLConsulta, $_dbConexion ) or die(mysql_error());
	return $_rsConsulta;
}

// Regresa cada linea del recorset en un arreglo asociativo
function obtenerDatosConsulta ( $_rsConsulta ){
	return mysql_fetch_assoc( $_rsConsulta );
}

// Regresa el total de registros de una consulta
function totalFilasConsulta ( $_rsConsulta ){
	return 	mysql_num_rows( $_rsConsulta );
}

// Libera los datos del obejto RecorSet
function liberarDatosSelect ( $_rsConsulta ){
	mysql_free_result( $_rsConsulta );
}
?>