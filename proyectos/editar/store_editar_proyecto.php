<?php
    require_once ('../../conexion.php');
    $conexion=conectarBD();
    /*proyecto*/
    $n_proyecto = $_GET['n_proyecto'];
    $estado     = $_POST['estado'];
    if( isset($_POST['num_supervisor']) ) {


    $supervisor = $_POST['num_supervisor'];

    if( isset($_POST['fecha_inicio']) ) {
      $Campofecha_rechazo      = 'null';
      $Campofecha_inicio       = $_POST['fecha_inicio'];
      $Campofecha_finalizacion = $_POST['fecha_finalizacion'];
      $query= "update proyecto set estado='$estado',fecha_inicio='$Campofecha_inicio' ,fecha_finalizacion='$Campofecha_finalizacion',
                fecha_rechazo=$Campofecha_rechazo, num_supervisor=$supervisor where num_proyecto=$n_proyecto";
        }
    if( isset($_POST['fecha_rechazo']) ){
      $Campofecha_rechazo      = $_POST['fecha_rechazo'];
      $Campofecha_inicio       = 'null';
      $Campofecha_finalizacion = 'null';
      $query= "update proyecto set estado='rechazado',fecha_inicio=$Campofecha_inicio ,fecha_finalizacion=$Campofecha_finalizacion,
                fecha_rechazo='$Campofecha_rechazo', num_supervisor=$supervisor where num_proyecto=$n_proyecto";
        }
      }
      else {
        $query= "update proyecto set estado='$estado' where num_proyecto=$n_proyecto";

      }




    pg_query($conexion,$query);
    header("Location: ../../proyectos/mostrar/informacion_proyecto.php?n_proyecto=$n_proyecto&opcion=informacion");
?>
