<?php
    require_once ('../../conexion.php');
    $conexion=conectarBD();
    /*proyecto*/
    $CampoEstado    = $_POST['estado'];
    $Campofecha_levantamiento  = $_POST['fecha_levantamiento'];
    $Camponum_supervisor    = $_POST['num_supervisor'];
    $Campoautorizado    = $_POST['autorizado'];

    session_start();
    $usuario=$_SESSION['username'];
    $query ="select num_colaborador from usuarios where usuario='$usuario';";
    $resultado=pg_query($conexion,$query) or die ("Error en la consulta");
    $filas=pg_fetch_array($resultado);
    $Camponum_captador=$filas["num_colaborador"];

    if( empty($_POST['fecha_rechazo']) ) {
      $Campofecha_rechazo = 'null';
      $Campofecha_inicio    = $_POST['fecha_inicio'];
      $Campofecha_finalizacion    = $_POST['fecha_finalizacion'];
      $query ="insert into proyecto(estado, fecha_lanzamiento,num_captador,num_supervisor,autorizado,fecha_inicio,fecha_finalizacion,fecha_rechazo) values ('$CampoEstado','$Campofecha_levantamiento',$Camponum_captador,$Camponum_supervisor,'$Campoautorizado','$Campofecha_inicio', '$Campofecha_finalizacion',$Campofecha_rechazo)";
    }
    else {
      $Campofecha_rechazo = $_POST['fecha_rechazo'];
      $Campofecha_inicio    = 'null';
      $Campofecha_finalizacion  = 'null';
      $query ="insert into proyecto(estado, fecha_lanzamiento,num_captador,num_supervisor,autorizado,fecha_inicio,fecha_finalizacion,fecha_rechazo) values ('$CampoEstado','$Campofecha_levantamiento',$Camponum_captador,$Camponum_supervisor,'$Campoautorizado',$Campofecha_inicio, $Campofecha_finalizacion,'$Campofecha_rechazo')";
    }
    pg_query($conexion,$query);
    /*Cliente*/
    $CampoNombre    = $_POST['Nombre'];
    $CampoApellido    = $_POST['Apellido'];
    $CampoTelefono    = $_POST['Telefono'];

    $query1 ="SELECT MAX(num_proyecto) num_proyecto FROM proyecto";

    $resultado=pg_query($conexion,$query1) or die ("Error en la consulta");//y esta linea es practicamente el query
    $nr=pg_num_rows($resultado);

          while ($filas=pg_fetch_array($resultado)) {
            $num=$filas["num_proyecto"];
          }


    if( empty($_POST['Tienda']) ) {
      $CampoTienda    = 'null';
      $CampoSucursal  = 'null';
      $CampoRazon = 'null';
      echo $CampoSucursal;
      $query ="insert into cliente(num_tienda, nombre_sucursal, razon_social, nombre, apellido,telefono,num_proyecto) values ($CampoTienda,$CampoSucursal,$CampoRazon,'$CampoNombre','$CampoApellido', '$CampoTelefono',$num)";}

    else {


        $CampoTienda    = $_POST['Tienda'];
        $CampoSucursal  = $_POST['Sucursal'];
        $CampoRazon = $_POST['Razon'];
        echo $CampoSucursal;
        $query ="insert into cliente(num_tienda, nombre_sucursal, razon_social, nombre, apellido,telefono,num_proyecto)
        values ('$CampoTienda','$CampoSucursal','$CampoRazon','$CampoNombre','$CampoApellido', '$CampoTelefono'
        ,$num)";}
    pg_query($conexion,$query);
    /*Cotizacion*/
    $CampoIncidencia    = $_POST['Incidencia'];
    $CampoTiempo        = $_POST['Tiempo'];

    $query="insert into cotizacion (num_incidencias,tiempo_entrega,num_proyecto) values ($CampoIncidencia,'$CampoTiempo',$num);";
    pg_query($conexion,$query);


    header("Location: nuevo_proyecto_material.php?n_proyecto=$num");
    exit;
?>
