<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Encargado</title>
    <link rel="stylesheet" href="../../css/css.css">
    <header id="header">
        <div class="estado">
              <ul>
                <li><a class="active" href="proyectos.php?estado=curso">En curso</a></li>
                <li><a href="proyectos.php?estado=terminado">Terminado</a></li>

                <?php
                    require_once ('..\..\conexion.php');
                    $conexion=conectarBD();
                    
                    $usuario=$_SESSION['username'];
                    $query3="SELECT tipo FROM usuarios WHERE usuario='$usuario' and tipo='captador'";
                    $resultado3=pg_query($conexion,$query3) or die ("Error en la consulta");
                    $tipo3=pg_num_rows($resultado3);

                    if ($tipo3>0) {
                      echo"<li><a href='proyectos.php?estado=rechazado'>Rechazado</a></li>";
                      echo"<li><a href='proyectos.php?estado=espera'>En espera</a></li>";
                    }
                ?>
              </ul>
        </div>
      </header>
  </head>

  <body>
  </body>

</html>
