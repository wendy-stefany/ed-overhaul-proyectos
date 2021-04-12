<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Encargado</title>
    <link rel="stylesheet" href="../../css/css.css">
  </head>
  <body class="encargado">

    <header id="header">
    <div class="navegacion">
      <img src="../../css/img/triangulos.png" class="triangulos" >
        <form action="../../proyectos/mostrar/informacion_proyecto.php" method="get" class="barra_busqueda">
          <input type="text" placeholder="Buscar proyecto..." name="n_proyecto" required>
          <input type="submit" value="/">
        </form>

    <div class="menu_proyectos">
        <img src="../../css/img/proyecto.png" class="img_proyecto" >
        <a href="../../proyectos/mostrar/proyectos.php?estado=curso" class='proyecto'>Proyectos</a>


      <?php
        session_start();
        require_once ('..\..\conexion.php');
        $conexion=conectarBD();
        $usuario=$_SESSION['username'];
        $query3="SELECT tipo FROM usuarios WHERE usuario='$usuario' and tipo='captador'";
        $resultado3=pg_query($conexion,$query3) or die ("Error en la consulta");
        $tipo3=pg_num_rows($resultado3);

        if ($tipo3>0) {
          echo"<img src='../../css/img/mas.png' class='img_mas' >";
          echo"<a href='../../proyectos/nuevo_proyecto/nuevo_proyecto.php' class='nuevo'>Nuevo proyecto</a>";

        }
          echo "<hr>";
        ?>
    </div>
    <div class="dropdown">
      <button class="dropbtn">Bienvenido <?php echo $_SESSION['username']; ?> .</button>
      <div class="dropdown-content">
        <a href="../../index.html">Salir</a>
      </div>
    </div>
    </div></header>


  </header>

        <div class="footer">hhhhhhhhh
        </div>
</body>



</html>
