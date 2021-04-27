<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Editar-proyecto</title>
    <link rel="stylesheet" href="../../css/css.css">

  </head>
  <body>

      <div class="formulario_editar">
        <div id="popup" class="overlay">
              <div id="popupBody">
                <img src='../../css/img/editar.png'>
                  <h2>Editar</h2>
                  <a id="cerrar" href='../../proyectos/mostrar/informacion_proyecto.php?n_proyecto=<?php $n_proyecto=($_GET['n_proyecto']);
                  echo "$n_proyecto" ?>&opcion=informacion'>&times;</a>
                  <div class="popupContent">
                    <?php
                    $n_proyecto=($_GET['n_proyecto']);
                    session_start();
                    $usuario=$_SESSION['username'];

                    require_once ('..\..\conexion.php');
                    $conexion=conectarBD();
                    $query ="SELECT* from proyecto pro
                             join cliente as cli
                             on pro.num_proyecto = cli.num_proyecto
                             join cotizacion as cot
                             on cot.num_proyecto = pro.num_proyecto
                             where pro.num_proyecto='$n_proyecto'";
                    $resultado=pg_query($conexion,$query) or die ("Error en la consulta");//y esta linea es practicamente el query
                    $nr=pg_num_rows($resultado);

                    if($nr>0){

                          echo "<form action='store_editar_proyecto.php?n_proyecto=$n_proyecto' method='post' class='editar'>";

                                  while ($filas=pg_fetch_array($resultado)) {
                                    $query2 ="select tipo,num_colaborador from usuarios where usuario='$usuario';";
                                    $resultado2=pg_query($conexion,$query2) or die ("Error en la consulta");
                                    $filas2=pg_fetch_array($resultado2);
                                    $tipo=$filas2["tipo"];

                                    if ($tipo=='admin' or $tipo=='captador') {

                                        $fecha_inicio=$filas["fecha_inicio"];
                                        echo"<label>Inicio</label>&nbsp;&nbsp;";
                                        echo"<input name='fecha_inicio' type='date' value='$fecha_inicio' >";
                                        $fecha_finalizacion=$filas["fecha_finalizacion"];
                                        echo"</br></br><label>Finalizacion</label>&nbsp;&nbsp;";
                                        echo"<input name='fecha_finalizacion' type='date' value='$fecha_finalizacion' >";
                                        $fecha_rechazo=$filas["fecha_rechazo"];
                                        echo"</br></br><label>Rechazo</label>&nbsp;&nbsp;";
                                        echo"<input name='fecha_rechazo' type='date' value='$fecha_rechazo' >";

                                  }

                                    $estado=$filas["estado"];
                                    echo"</br></br><label>Estado</label>&nbsp;&nbsp;";
                                    echo"<select name='estado'>
                                       <option selected value='$estado'>$estado</option>
                                       <option value='curso'>Curso</option>
                                       <option value='terminado'>Terminado</option>
                                       <option value='rechazado'>Rechazado</option>
                                       <option value='espera'>Espera</option>
                                    </select>";
                                    if ($tipo=='admin' or $tipo=='captador') {
                                          echo"</br></br><label>#Supervisor</label>&nbsp;&nbsp;";
                                          $supervisor=$filas["num_supervisor"];
                                          echo"<select name='num_supervisor'>";
                                          $query2 ="SELECT* from usuarios where num_colaborador='$supervisor'";
                                          $resultado2=pg_query($conexion,$query2) or die ("Error en la consulta");//y esta linea es practicamente el query

                                          while ($filas2=pg_fetch_array($resultado2)) {
                                              $num_colaborador=$filas2['num_colaborador'];
                                              $nombre=$filas2['usuario'];
                                              echo "<option value='$num_colaborador'>$nombre</option>";}

                                          $query ="SELECT* from usuarios where tipo='supervisor'";
                                          $resultado=pg_query($conexion,$query) or die ("Error en la consulta");//y esta linea es practicamente el query
                                          $nr=pg_num_rows($resultado);

                                          if($nr>0){
                                              while ($filas=pg_fetch_array($resultado)) {
                                                  $num_colaborador=$filas['num_colaborador'];
                                                  $nombre=$filas['usuario'];
                                                  echo "<option value='$num_colaborador'>$nombre</option>";
                                                }
                                              }
                                            }
                                          }
                                          echo "</select>";
                                          echo"</br></br><input type='submit' value='Guardar'>";
                                  echo "</form>";

                            }

                    ?>
                  </div>
              </div>
          </div>
        </div>

          </dody>
  </html>
