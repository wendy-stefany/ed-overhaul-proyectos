<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>ED-Informacion </title>
    <link rel="stylesheet" href="../../css/css.css">

  </head>
  <body>
    <div class="nuevo_comentario">
      <img src='../../css/img/hacer_comentario.png' >
      <a href="#popup">Redactar</a>
      <div id="popup" class="overlay">
              <div id="popupBody">
                <img src='../../css/img/hacer_comentario.png'>
                  <h2>Redactar</h2>
                  <a id="cerrar" href="#">&times;</a>
                  <div class="popupContent">
                    <form action="../../proyectos/comentario/store_nuevo_comentario.php?n_proyecto=<?php $n_proyecto=($_GET['n_proyecto']);
                    echo "$n_proyecto" ?>" method="post">
                        <textarea name="contenido" placeholder="Comentario..." rows="6" required></textarea>
                        </br>
                        <button id="alta" name="alta" type="submit" class="btn">Enviar</button>
                    </form>
                  </div>
              </div>
          </div>
        </div>
        <?php
            include("../../barra_busqueda_y_pie.php");
            $n_proyecto=($_GET['n_proyecto']);
            require_once ('..\..\conexion.php');
            $conexion=conectarBD();
            $query ="SELECT *from comentario where num_proyecto=$n_proyecto order by num_comentario desc;";
            $resultado=pg_query($conexion,$query) or die ("Error en la consulta");//y esta linea es practicamente el query
            $nr=pg_num_rows($resultado);
            echo "<div class='class-table-style'>";
              if($nr>0){
                   echo"<p class='c_p'>  Comentarios Proyecto #$n_proyecto</p>";
                   echo "<table class='table-style'>";
                   echo"<tr><td></td><td>Colaborador</td><td># Comentario</td><td>Fecha</td><td>Contenido</td>";
                   echo "</tr><tr>";
                   while ($filas=pg_fetch_array($resultado)) {
                     echo"<tr><td><img src='../../css/img/comentario2.png'  ></td>";
                     $num_colaborador=$filas["num_colaborador"];
                     $query2 ="SELECT nombre,apellido from colaboradores
                              where num_colaborador='$num_colaborador'";
                     $resultado2=pg_query($conexion,$query2) or die ("Error en la consultaaaaa");
                     $filas2=pg_fetch_array($resultado2);
                     $nombre_colaborador=$filas2["nombre"];
                     $apellido_colaborador=$filas2["apellido"];

                      echo"<td> $nombre_colaborador $apellido_colaborador </td>";
                      echo"<td>".$filas["num_comentario"]."</td>";
                      echo"<td>".$filas["fecha"]."</td>";
                      echo"<td>".$filas["contenido"]."</td></tr>";
                    }
            }

            else {
              echo "<table class='table-style'>";
              echo "<img src='../../css/img/admiracion.png' >";
              echo "<p class='advertencia' >No hay resultados<p>";
              echo "</table>";
                }
          echo "</div>";
        ?>


  </body>
  </html>
