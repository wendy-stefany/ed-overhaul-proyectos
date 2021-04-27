<?php
  require_once ('..\..\conexion.php');
  $conexion=conectarBD();
  $num_colaborador= $_GET['num_colaborador'];
  $nombre         = $_POST['nombre'];
  $apellido       = $_POST['apellido'];
  $habilidad      = $_POST['habilidad'];

  $query="update colaboradores set nombre='$nombre', apellido='$apellido', habilidad='habilidad'
          where num_colaborador=$num_colaborador";
  pg_query($conexion,$query);

  if( isset($_POST['usuario']) ) {
    echo "string";
    $usuario        = $_POST['usuario'];
    $contrasena     = $_POST['contrasena'];
    $tipo           = $_POST['tipo'];
    $query="SELECT * FROM usuarios WHERE usuario='$usuario'";
    $resultado=pg_query($conexion,$query) or die ("Error en la consulta");
    $tipo2=pg_num_rows($resultado);

    if ($tipo2>0) {
      $query2="update usuarios set usuario='$usuario', contrasena='$contrasena',tipo='$tipo' where num_colaborador=$num_colaborador";
    }
    else {
      $query2="insert into usuarios(usuario,contrasena,tipo,num_colaborador) values ('$usuario','$contrasena','$tipo','$num_colaborador')";
    }
      pg_query($conexion,$query2);
  }

    header("Location: ../../colaboradores/usuarios/usuario.php?n_colaborador=$num_colaborador");

?>
