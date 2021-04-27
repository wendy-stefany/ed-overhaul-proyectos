<?php
    include("../../barra_busqueda_y_pie.php");
    include("../../barra_proyectos.php");

    require_once ('../../conexion.php');
    $conexion=conectarBD();

    $usuario=$_SESSION['username'];
    $query ="select tipo,num_colaborador from usuarios where usuario='$usuario';";
    $resultado=pg_query($conexion,$query) or die ("Error en la consulta");
    $filas=pg_fetch_array($resultado);
    $tipo=$filas["tipo"];
    $num_captador=$filas["num_colaborador"];

    $estado=($_GET['estado']);

    if ($tipo=='admin') {
      $query ="select pro.num_proyecto, pro.fecha_inicio, pro.fecha_finalizacion, cli.razon_social
                from proyecto pro inner join cliente cli on pro.num_proyecto=cli.num_proyecto
                where pro.estado='$estado'";
    }

    else {
      $query ="select pro.num_proyecto, pro.fecha_inicio, pro.fecha_finalizacion, cli.razon_social
                from proyecto pro inner join cliente cli on pro.num_proyecto=cli.num_proyecto
                where pro.estado='$estado' and (pro.num_captador=$num_captador or pro.num_supervisor=$num_captador)";
    }

    $resultado=pg_query($conexion,$query) or die ("Error en la consulta");//y esta linea es practicamente el query
    $nr=pg_num_rows($resultado);

    $query2="SELECT estado FROM Proyecto WHERE estado='curso'";
    $resultado2=pg_query($conexion,$query2) or die ("Error en la consulta");
    $n_proyectos=pg_num_rows($resultado);
    echo "<div class='class-table-style'>";
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
                    echo"<td> <a  href='../../proyectos/mostrar/informacion_proyecto.php?n_proyecto=$n_proyecto&opcion=informacion'>Ver mas</a></td>";
                    if ($tipo=='admin') {
                      echo"<td> <a href='../../eliminar/store_eliminar_proyecto.php?n_proyecto= $n_proyecto'><img src='../../css/img/eliminar.png'></a></td></tr>";
                    }
                  }echo"</table>";
          }
          else {

            echo "<table class='table-style'>";
            echo "<img src='../../css/img/admiracion.png' >";
            echo "<p class='advertencia' >No hay resultados<p>";
            echo"</table>";
          }
          echo "</div>";

?>
