<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../../csss/css.css">
<style>
</style>
</head>
<body>

<ul>
  <?php
      $option=($_GET['estado']);
      require_once ('..\..\conexion.php');
      $conexion=conectarBD();

      $usuario=$_SESSION['username'];
      $query3="SELECT tipo FROM usuarios WHERE usuario='$usuario' and (tipo='captador' or tipo='admin')";
      $resultado3=pg_query($conexion,$query3) or die ("Error en la consulta");
      $tipo3=pg_num_rows($resultado3);


      if ($option=='curso') {
        echo "<li><a href='proyectos.php?estado=curso' class='active'>Curso</a></li>";
        echo "<li><a href='proyectos.php?estado=terminado'>Terminado</a></li>";
        if ($tipo3>0) {
            echo "<li><a href='proyectos.php?estado=rechazado'>Rechazado</a></li>";
            echo "<li><a href='proyectos.php?estado=espera'>Espera</a></li>";
        }
      }
      if ($option=='terminado') {
        echo "<li><a href='proyectos.php?estado=curso'>Curso</a></li>";
        echo "<li><a href='proyectos.php?estado=terminado' class='active'>Terminado</a></li>";
        if ($tipo3>0) {
            echo "<li><a href='proyectos.php?estado=rechazado'>Rechazado</a></li>";
            echo "<li><a href='proyectos.php?estado=espera'>Espera</a></li>";
        }
      }
      if ($option=='rechazado') {
        echo "<li><a href='proyectos.php?estado=curso' >Curso</a></li>";
        echo "<li><a href='proyectos.php?estado=terminado'>Terminado</a></li>";
        if ($tipo3>0) {
            echo "<li><a href='proyectos.php?estado=rechazado' class='active'>Rechazado</a></li>";
            echo "<li><a href='proyectos.php?estado=espera'>Espera</a></li>";
        }
      }
      if ($option=='espera') {
        echo "<li><a href='proyectos.php?estado=curso'>Curso</a></li>";
        echo "<li><a href='proyectos.php?estado=terminado'>Terminado</a></li>";
        if ($tipo3>0) {
            echo "<li><a href='proyectos.php?estado=rechazado'>Rechazado</a></li>";
            echo "<li><a href='proyectos.php?estado=espera' class='active'>Espera</a></li>";
        }
      }
        ?>



</ul>


</body>
</html>
