<?php
    include("../../barra_busqueda_y_pie.php");
    include("../../barra_proyectos.php");

    require_once ('../../conexion.php');
    $conexion=conectarBD();


    $usuario=$_SESSION['username'];
    $query ="select num_colaborador from usuarios where usuario='$usuario';";
    $resultado=pg_query($conexion,$query) or die ("Error en la consulta");
    $filas=pg_fetch_array($resultado);
    $num_captador=$filas["num_colaborador"];


    $estado=($_GET['estado']);
    $query ="select pro.num_proyecto, pro.fecha_inicio, pro.fecha_finalizacion, cli.razon_social
              from proyecto pro inner join cliente cli on pro.num_proyecto=cli.num_proyecto
              where pro.estado='$estado' and (pro.num_captador=$num_captador or pro.num_supervisor=$num_captador)";
    $resultado=pg_query($conexion,$query) or die ("Error en la consulta");//y esta linea es practicamente el query
    $nr=pg_num_rows($resultado);

    $query2="SELECT estado FROM Proyecto WHERE estado='curso'";
    $resultado2=pg_query($conexion,$query2) or die ("Error en la consulta");
    $n_proyectos=pg_num_rows($resultado);
    if($nr>0){
      echo "<table class='table-style'> <tr><td></td><td></td><td></td><td></td><td></td><td>Total proyectos:</td><td>".$n_proyectos."</td></tr>";

            while ($filas=pg_fetch_array($resultado)) {
              echo"<tr><td><img src='../../css/img/carpeta.png'  ></td>";
              echo"<td>".$filas["num_proyecto"]."</td>";
              echo"<td>".$filas["razon_social"]."</td>";
              echo"<td>".$filas["fecha_inicio"]."</td>";
              echo"<td>".$filas["fecha_finalizacion"]."</td>";
              $n_proyecto=$filas["num_proyecto"];
              echo"<td> <a  href='../../proyectos/comentario/comentario.php?n_proyecto= $n_proyecto'>Comentarios</a></td>";
              echo"<td> <a  href='../../proyectos/mostrar/informacion_proyecto.php?n_proyecto= $n_proyecto'>Ver mas</a></td></tr>";

            }echo"</table>";
    }
    else {
      echo "<img src='../../css/img/admiracion.png' class='advertencia'>";
      echo "<b class='advertencia'>No hay resultados<b>";
    }

?>
