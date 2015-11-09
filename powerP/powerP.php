<?php
	require_once('funciones/mysql.php');
	
    $_stringUser=$_SESSION['t01usuario']['username'];
    $_idUser=$_SESSION['t01usuario']['idUsuarios'];


?>
<!DOCTYPE html>
<html>
<head>
<?php
header('Content-Type: text/html; charset=UTF-8'); 
?>
<link rel="stylesheet" href="css/blueimp-gallery.min.css">



<title>Page Title</title>


</head>
<body>
    <!-- The Gallery as lightbox dialog, should be a child element of the document body -->

<script src="js/blueimp-gallery.min.js"></script>
<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
    <div class="slides"></div>
    <h3 class="title"></h3>
    <a class="prev"><</a>
    <a class="next">></a>
    <a class="close">X</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
</div>


<div id="links">
    <?php
    $_strSelectUsuarioFotos = "SELECT * FROM Fotos"; 
    $_rsConsultaUsuario = ejecutaSQL( $_strSelectUsuarioFotos );
    $_arrDatoUsuario = obtenerDatosConsulta ( $_rsConsultaUsuario );
      do{

    echo "<a href="."'img/imagenesUsaurios/big/".$_arrDatoUsuario['nombreFotos']."''>".
        "<img src="."'img/imagenesUsaurios/small/"."tn_".$_arrDatoUsuario['nombreFotos'] . "'>
    </a>";  
 
      }while ( $_arrDatoUsuario = obtenerDatosConsulta($_rsConsultaUsuario ));
        /*
foreach ($_arrDatoUsuario as $_datosUsuarios => $valor) {
                    echo "CLAVE $_datosUsuarios  VALOR $valor";

            }        
*/

 
          


 ?>
 </div>

<script>
document.getElementById('links').onclick = function (event) {
    event = event || window.event;
    var target = event.target || event.srcElement,
        link = target.src ? target.parentNode : target,
        options = {index: link, event: event},
        links = this.getElementsByTagName('a');
    blueimp.Gallery(links, options);
};
</script>

<!-- The Gallery as inline carousel, can be positioned anywhere on the page -->
<div id="blueimp-gallery-carousel" class="blueimp-gallery blueimp-gallery-carousel">
    <div class="slides"></div>
    <h3 class="title"></h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
</div>


</body>
</html>