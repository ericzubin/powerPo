<?php 


	require_once('funciones/mysql.php');
	require_once('funciones/sesiones.php'); 
	validaSesion();

    $_idUser=$_SESSION['t01usuario']['idUsuarios'];

?> 
    <?php require_once("include/menu_arriba.php"); ?>
 <p class="" ><a href="formularioSubirImagen.php">Atras</></p>

<?php
$_stringUser=$_SESSION['t01usuario']['username'];
$temp = $_FILES['foto']['tmp_name']; // tmp name (no se puede cambiar el nombre nos devuelve la ubicación temporal del archivo. 
$name = $_FILES['foto']['name']; // nombre original del archivo 
$tamanoBytes = $_FILES['foto']['size']; // En bytes 
$tipoFile = $_FILES['foto']['type'];
// VALIDAR PESO DEL ARCHIVO. LIMITAR SUBIDA POR PESO 
// LIMITAMOS A 300KB 


// VALIDAR POR TIPO DE ARCHIVO. 
// COMPROBAMOS LA EXTENSIÓN DEL ARCHIVO SÓLO ADMITIMOS JPH, GIF Y PNG 
if($tipoFile == "image/jpeg" || $tipoFile == "image/gif" || $tipoFile == "image/png")
{ 
//echo "Es el tipo esperado <br/>"; 
} 
else{ 
echo "Archivo no válido"; 
exit; 
} 
// LE ASIGNAMOS UN NOMBRE DE EXTENSIÓN A LOS ARCHIVOS GRÁFICOS 
switch ($tipoFile) 
{ 
case 'image/jpeg': 
$ext = ".jpg"; 
break;

case 'image/gif': 
$ext = ".gif"; 
break; 

case 'image/png': 
$ext = ".png"; 
break; 
}

// VALOR ALEATORIO CON EL QUE SE ALMACENARÁ EL ARCHIVO 
$str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890"; 
$cad = ""; 
// 18 ES EL LARGO DEL STRING RANDOM, ESTE SERÁ EL TAMAÑO DEL NOMBRE DEL ARCHIVO 
for($i=0;$i<18;$i++) { 
$cad .= substr($str,rand(0,62),1); 
}

// REEMPLAZAR EN CASO DE NOMBRE COMPUESTOS LOS ESPACIOS POR GUIÓN BAJO 
//$alea1 = str_replace(" ","_",$alea1);

$alea1 = $cad.$ext; 
//echo "Alea: " .$alea1 ."<br/>";

//copy($temp,$alea1); 
$fecha = date("y-m-d");

// AHORA GUARDAMOS EL ARCHVO EN UNA BASE DE DATOS.
//Usuarios_idUsuarios
//$_idUser
//$_stringNombre=$_POST['nombreArchivo'];
$sql1="insert into fotos values (null,'$alea1',$_idUser,'$_stringNombre')";
$_stringSQL="INSERT INTO `Fotos`(`idFotos`, `nombreFotos`, `Usuarios_idUsuarios`, `nombreImagen`) VALUES (null,'$alea1',$_idUser,'$_stringNombre')";
//echo $_stringSQL;
$sql ="insert into fotos values (null,'$alea1')"; 
$result = ejecutaSQL($_stringSQL);
// Podemos recuperar el último id guardado mediante 
//echo "MYSQL: " .mysql_insert_id($con);
//Indicamos el usuario
    $_stringUser=$_SESSION['t01usuario']['username'];

// Indicamos el directorio donde se guardará el archivo 
$dir="img/imagenesUsaurios/big/";



move_uploaded_file ($temp,"$dir/$alea1");

// LAS SIGUIENTES LÍNEAS NOS DAN LA INFORMACIÓN DE LO REALIZADO 
//echo "Esta es la exte: " .$ext ."<br/>"; 
//echo "El archivo tienen como nombre: " .$name ."<br/>"; 
//echo "El archivo en el servidor es temporal, como: " .$temp ."<br/>"; 
//echo "El tamaño del archivo es: " .$tamanoBytes ."<br />"; 
//echo "El tipo del archivo es: " .$tipoFile ."<br/&gt;"; 
//echo "El peso en KB es de: " .round($kiloBytes,2) ."Kb <br/>";


///////////////////////////////

////Estas lineas nos va a comprimir las imagenes 

////Estas lineas nos va a comprimir las imagenes 
	$imagen="img/imagenesUsaurios/big/".$alea1;
    $altura=150;
    // Lugar donde se guardarán los thumbnails respecto a la carpeta donde está la imagen "grande". 
     $dir_thumb = "img/imagenesUsaurios/small/"; 
     // Prefijo que se añadirá al nombre del thumbnail. Ejemplo: si la imagen grande fuera "imagen1.jpg", 
     // el thumbnail se llamaría "tn_imagen1.jpg" 
     $prefijo_thumb = "tn_"; 

     // Aquí tendremos el nombre de la imagen. 
     $nombre=basename($imagen); 
     // Aquí la ruta especificada para buscar la imagen. 
     $camino=dirname($imagen)."/"; 

     // Intentamos crear el directorio de thumbnails, si no existiera previamente. 
     // Aquí comprovamos que la imagen que queremos crear no exista previamente 
      
          $img = @imagecreatefromjpeg($camino.$nombre) or die("No se encuentra la imagen $camino$nombre<br>\n"); 

          // miramos el tamaño de la imagen original... 
          $datos = getimagesize($camino.$nombre) or die("Problemas con $camino$nombre<br>\n"); 

          // intentamos escalar la imagen original a la medida que nos interesa 
          $ratio = ($datos[1] / $altura); 
          $anchura = round($datos[0] / $ratio); 

          // esta será la nueva imagen reescalada 
          $thumb = imagecreatetruecolor($anchura,$altura); 

          // con esta función la reescalamos 
          imagecopyresampled ($thumb, $img, 0, 0, 0, 0, $anchura, $altura, $datos[0], $datos[1]); 

          // voilà la salvamos con el nombre y en el lugar que nos interesa.
          $_stringDireccion="$dir_thumb$prefijo_thumb$nombre"; 
          imagejpeg($thumb,$_stringDireccion); 




//echo "www.dtech20.com/powerP/img/imagenesUsaurios/big/$alea1";


/////////////////////////////////////7



?> 

<img src="<?php echo"img/imagenesUsaurios/big/$alea1"; ?>" >



