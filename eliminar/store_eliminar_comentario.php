<?php
$CampoNum = $_GET['n_comentario'];
$n_proyecto =$_GET['n_proyecto'];

require_once ('..\conexion.php');
$conexion=conectarBD();

$query="delete from comentario where num_comentario=$CampoNum;";
pg_query($conexion,$query);
header("Location: ../proyectos/comentario/comentario.php?n_proyecto=$n_proyecto");
exit;
?>
