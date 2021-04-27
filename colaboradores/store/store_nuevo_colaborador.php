<?php
$CampoNombre    = $_POST['nombre'];
$CampoApellido  = $_POST['apellido'];
$CampoHabilidad = $_POST['habilidad'];

require_once ('..\..\conexion.php');
$conexion=conectarBD();

$query ="insert into colaboradores(nombre, apellido, habilidad) values ('$CampoNombre','$CampoApellido','$CampoHabilidad')";
 pg_query($conexion,$query);

 header('Location: ../../colaboradores/mostrar/colaboradores.php?tipo=null#popup');
 exit;
?>
