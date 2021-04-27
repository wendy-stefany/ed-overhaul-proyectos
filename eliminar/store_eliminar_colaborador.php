<?php
  $CampoNum = $_GET['n_colaborador'];
  $tipo    = $_GET['tipo'];

  require_once ('..\conexion.php');
  $conexion=conectarBD();

  $query2="delete from usuarios where num_colaborador=$CampoNum;";
  pg_query($conexion,$query2);

  $query="delete from colaboradores where num_colaborador=$CampoNum;";
  pg_query($conexion,$query);

  header("Location: ../colaboradores/mostrar/colaboradores.php?tipo=$tipo");
?>
