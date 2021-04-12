<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>ED-Informacion </title>
    <link rel="stylesheet" href="../../css/css.css">

  </head>
  <body>
    <?php
    include("../../barra_busqueda_y_pie.php");
    $n_proyecto=($_GET['n_proyecto']);
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
            echo "<table class='informacion'>";

                  while ($filas=pg_fetch_array($resultado)) {
                    session_start();
                    $usuario=$_SESSION['username'];
                    $query3="SELECT tipo FROM usuarios WHERE usuario='$usuario' and tipo='captador'";
                    $resultado3=pg_query($conexion,$query3) or die ("Error en la consulta");
                    $tipo3=pg_num_rows($resultado3);

                    if ($tipo3>0) {
                      echo"<tr>";
                      echo"<td class='etiqueta'><img src='../../css/img/editar.png' class='img_editar' ></td>";
                      echo"<td class='etiqueta'><a href='../../proyectos/editar/editar_proyecto.php?n_proyecto= $n_proyecto' class='text-editar'>Editar</a></td>";
                      echo "</tr>";
                    }

                    echo"<tr>";
                    echo"<td class='seccion'>Proyecto</td>";
                    echo "</tr><tr>";

                    echo"<td class='etiqueta'>#Proyecto</td>";
                    echo"<td>".$filas["num_proyecto"]."</td>";
                    echo "</tr><tr>";
                    echo"<td class='etiqueta'>Levantamiento</td>";
                    echo"<td>".$filas["fecha_lanzamiento"]."</td>";
                    echo"<td class='etiqueta'>Inicio</td>";
                    echo"<td>".$filas["fecha_inicio"]."</td>";
                    echo"<td class='etiqueta'>Finalizacion</td>";
                    echo"<td>".$filas["fecha_finalizacion"]."</td>";
                    echo"<td class='etiqueta'>Rechazo</td>";
                    echo"<td>".$filas["fecha_rechazo"]."</td>";
                    echo "</tr><tr>";


                    echo"<td class='etiqueta'>Estado</td>";
                    echo"<td>".$filas["estado"]."</td>";
                    echo"<td class='etiqueta'>#Captador</td>";
                    echo"<td>".$filas["num_captador"]."</td>";
                    echo"<td class='etiqueta'>#Supervisor</td>";
                    echo"<td>".$filas["num_supervisor"]."</td>";
                    echo "</tr><tr>";

                    echo"<td class='seccion'>Cliente</td>";
                    echo "</tr><tr>";
                    echo"<td class='etiqueta'>#Tienda</td>";
                    echo"<td>".$filas["num_tienda"]."</td>";
                    echo"<td class='etiqueta'>Sucursal</td>";
                    echo"<td>".$filas["nombre_sucursal"]."</td>";
                    echo"<td class='etiqueta'>Razon social</td>";
                    echo"<td>".$filas["razon_social"]."</td>";
                    echo "</tr><tr>";

                    echo"<td class='etiqueta'>Nombre</td>";
                    echo"<td>".$filas["nombre"]."</td>";
                    echo"<td class='etiqueta'>Apellido</td>";
                    echo"<td>".$filas["apellido"]."</td>";
                    echo"<td class='etiqueta'>Telefono</td>";
                    echo"<td>".$filas["telefono"]."</td>";
                    echo "</tr><tr>";

                    echo"<td class='seccion'>Cotizacion</td>";
                    echo "</tr><tr>";
                    echo"<td class='etiqueta'>#Cotizacion</td>";
                    echo"<td>".$filas["num_cotizacion"]."</td>";
                    $num_cotizacion=$filas["num_cotizacion"];
                    echo "</tr><tr>";
                    echo"<td class='etiqueta'>#Incidencia</td>";
                    echo"<td>".$filas["num_incidencias"]."</td>";
                    echo"<td class='etiqueta'>Tiempo de entrega</td>";
                    echo"<td>".$filas["tiempo_entrega"]."</td></tr>";

                  }
                  $costo=0;
                  $query ="SELECT *from material where num_cotizacion='$num_cotizacion';";//esta
                  $resultado=pg_query($conexion,$query) or die ("Error en la consulta");//y esta linea es practicamente el query
                  $nr=pg_num_rows($resultado);
                  if($nr>0){
                            echo"<td class='seccion'>Material</td>";
                            while ($filas=pg_fetch_array($resultado)) {
                              echo "</tr><tr>";
                              echo"<td class='etiqueta'>Cantidad</td>";
                              echo"<td>".$filas["cantidad_material"]."</td>";
                              $cant=$filas["cantidad_material"];
                              echo"<td class='etiqueta'>Cancepto</td>";
                              echo"<td>".$filas["concepto"]."</td>";
                              echo"<td class='etiqueta'>Costo</td>";
                              echo"<td>$".$filas["costo_unitario"]."</td>";
                              $cost=$filas["costo_unitario"];
                              $t  = $cost * $cant;
                              $costo=$costo+$t;
                              echo"<td class='etiqueta'>Costo total</td>";
                              echo"<td>$".$t."</td></tr>";
                            }
                              $iva=$costo *.16;
                              $total =$costo+$iva;
                              echo"<tr><td></td><td></td>";
                              echo"<td class='etiqueta'>Costo</td>";
                              echo"<td>$".$costo."</td>";
                              echo"<td class='etiqueta'>IVA</td>";
                              echo"<td>$".$iva."</td>";
                              echo"<td class='etiqueta'>Total</td>";
                              echo"<td>$".$total."</td></tr>";
                        }

                  $query ="SELECT colaborador_proyecto.num_proyecto, colaborador_proyecto.num_colaborador, colaboradores.nombre, colaboradores.apellido
                            FROM colaborador_proyecto, colaboradores WHERE colaborador_proyecto.num_colaborador = colaboradores.num_colaborador and
                            colaborador_proyecto.num_proyecto='$n_proyecto';";
                  $resultado=pg_query($conexion,$query) or die ("Error en la consulta");
                  $nr=pg_num_rows($resultado);
                  if($nr>0){

                            echo"<td class='seccion'>Colaboradores</td>";
                          while ($filas=pg_fetch_array($resultado)) {
                            echo "</tr><tr>";
                            echo"<td class='etiqueta'>#Colaborador</td>";
                            echo"<td>".$filas["num_colaborador"]."</td>";
                            echo"<td class='etiqueta'>Nombre</td>";
                            echo"<td>".$filas["nombre"]."</td>";
                            echo"<td class='etiqueta'>Apellido</td>";
                            echo"<td>".$filas["apellido"]."</td></tr>";
                          }

                          echo"</table>";
                  }
    }
    else {
      echo "<table class='proyectos'> <tr><td class='advertencia'><img src='../../css/img/admiracion.png'  ></td></tr>";
      echo"<tr><td class='advertencia'>No hay resultados</td></tr>";
      echo"</table>";
        }

    ?>

  </dody>

  </html>
