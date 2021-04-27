<?php
$CampoNum   = $_GET['n_proyecto'];

require_once ('..\conexion.php');
$conexion=conectarBD();

$query="delete from comentario where num_proyecto=$CampoNum;";
pg_query($conexion,$query);
$query="delete from cliente where num_proyecto=$CampoNum;";
pg_query($conexion,$query);
$query="delete from colaborador_proyecto where num_proyecto=$CampoNum;";
pg_query($conexion,$query);


$query1 ="SELECT num_cotizacion FROM cotizacion where num_proyecto=$CampoNum;";

$resultado=pg_query($conexion,$query1) or die ("Error en la consulta");//y esta linea es practicamente el query
$nr=pg_num_rows($resultado);

      while ($filas=pg_fetch_array($resultado)) {
        $num=$filas["num_cotizacion"];
      }

echo $num;
$query="delete from material where num_cotizacion=$num;";
pg_query($conexion,$query);

$query="delete from cotizacion where num_proyecto=$CampoNum;";
pg_query($conexion,$query);


$query="delete from proyecto where num_proyecto=$CampoNum;";
pg_query($conexion,$query);

header('Location: ../proyectos/mostrar/proyectos.php?estado=curso');
exit;
?>
