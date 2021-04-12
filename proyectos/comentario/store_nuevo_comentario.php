<?php
  session_start();
  $usuario=$_SESSION['username'];
  $n_proyecto=($_GET['n_proyecto']);
  date_default_timezone_set('America/Mexico_City');
  $fecha = date("Y-m-d");
  $contenido    = $_POST['contenido'];
  require_once ('..\..\conexion.php');
  $conexion=conectarBD();


  $query ="select num_colaborador from usuarios where usuario='$usuario';";
  $resultado=pg_query($conexion,$query) or die ("Error en la consulta");
  $filas=pg_fetch_array($resultado);
  $num_colaborador=$filas["num_colaborador"];
  echo "$num_colaborador";
  $query ="insert into comentario(num_proyecto, num_colaborador, fecha, Contenido)
            values ($n_proyecto,$num_colaborador,'$fecha','$contenido')";
  pg_query($conexion,$query);
  header("Location: ../../proyectos/comentario/comentario.php?n_proyecto= $n_proyecto");
  exit;


?>
