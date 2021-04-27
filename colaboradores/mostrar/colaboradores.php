<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>ED-Informacion </title>
    <link rel="stylesheet" href="../../css/css.css">

  </head>
  <body>
    <div class="nuevo_comentario">
      <img src='../../css/img/anadir.png' >
      <a href="#popup">Nuevo</a>
      <div id="popup" class="overlay">
              <div id="popupBody">
                <img src='../../css/img/anadir.png'>
                  <h2>Nuevo Colaborador</h2>
                  <a id="cerrar" href="#">&times;</a>
                  <div class="popupContent">
                    <form action="../../colaboradores/store/store_nuevo_colaborador.php" method="post">
                        <input name="nombre" type="text" placeholder="Nombre" maxlength="30" />
                      </br></br>
                        <input name="apellido" type="text" placeholder="Apellido" maxlength="30" />
                        </br></br>
                        <textarea name="habilidad" placeholder="Habilidades..." rows="6" required></textarea>
                        </br>
                        <button id="alta" name="alta" type="submit" class="btn">Dar de alta</button>
                    </form>
                  </div>
              </div>
          </div>
        </div>
        <?php
            include("../../barra_busqueda_y_pie.php");
            include("../../barra_colaboradores.php");

            require_once ('../../conexion.php');
            $conexion=conectarBD();
            $tipo=$_GET['tipo'];
            if ($tipo=='null') {
              $query ="Select * from  colaboradores where not exists
                      (select * from usuarios where usuarios.num_colaborador =  colaboradores.num_colaborador)";
            }
            else {
              $query ="select * from usuarios us inner join colaboradores col on us.num_colaborador=col.num_colaborador
                      where us.tipo='$tipo' order by nombre  ;";

            }

            $resultado=pg_query($conexion,$query) or die ("Error en la consulta");//y esta linea es practicamente el query
            $nr=pg_num_rows($resultado);
            echo "<div class='class-table-style'>";
              if($nr>0){
                   echo"<p class='c_p'>Colaboradores   </p>";
                   echo "<table class='table-style'>";
                   echo"<tr><td></td><td>Colaborador</td><td># Colaborador</td><td>Habiliades</td>";
                   echo "</tr><tr>";
                   while ($filas=pg_fetch_array($resultado)) {
                     echo"<tr><td><img src='../../css/img/colaborador.png'  ></td>";
                       $nombre_colaborador=$filas["nombre"];
                       $apellido_colaborador=$filas["apellido"];
                      echo"<td> $nombre_colaborador $apellido_colaborador </td>";
                      echo"<td>".$filas["num_colaborador"]."</td>";
                      $num_colaborador=$filas["num_colaborador"];
                      echo"<td>".$filas["habilidad"]."</td>";
                      echo"<td> <a href='../../eliminar/store_eliminar_colaborador.php?n_colaborador=$num_colaborador&tipo=$tipo'><img src='../../css/img/eliminar.png'></a></td>";

                      if ($tipo!=null) {
                        echo"<td> <a href='../../colaboradores/usuarios/usuario.php?n_colaborador=$num_colaborador'><img src='../../css/img/configuraciones.png'></a></td></tr>";
                      }
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
