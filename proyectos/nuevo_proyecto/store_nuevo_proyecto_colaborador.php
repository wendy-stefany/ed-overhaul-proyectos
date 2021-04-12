<?php

$CampoColaborador    = $_POST['num_colaborador'];

include '../../conexion.php';
$conexion = conectarBD();

$query1 ="SELECT MAX(num_proyecto) num_proyecto FROM proyecto";

$resultado=pg_query($conexion,$query1) or die ("Error en la consulta");//y esta linea es practicamente el query
$nr=pg_num_rows($resultado);

      while ($filas=pg_fetch_array($resultado)) {
        $num=$filas["num_proyecto"];
      }


$query ="insert into colaborador_proyecto(num_proyecto,num_colaborador) values ($num,$CampoColaborador)";
 pg_query($conexion,$query);

 header('Location: nuevo_proyecto_colaborador.php');
 exit;
?>
