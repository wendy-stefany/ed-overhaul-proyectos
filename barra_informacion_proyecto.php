<!DOCTYPE html>
      <html>
        <head>
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="../../csss/css.css">
        </head>
          <body>

                      <ul>
                              <?php
                                  $option=($_GET['opcion']);
                                  $n_proyecto=($_GET['n_proyecto']);
                                  require_once ('..\..\conexion.php');
                                  $conexion=conectarBD();

                                  $usuario=$_SESSION['username'];

                                  $query3 ="select tipo from usuarios where usuario='$usuario';";
                                  $resultado3=pg_query($conexion,$query3) or die ("Error en la consulta");
                                  $filas3=pg_fetch_array($resultado3);
                                  $tipo=$filas3["tipo"];


                                  if ($option=='informacion') {
                                    echo "<li><a href='../../proyectos/mostrar/informacion_proyecto.php?n_proyecto= $n_proyecto' class='active'>Informacion</a></li>";
                                    echo "<li><a href='../../proyectos/editar/editar_proyecto.php?n_proyecto= $n_proyecto#popup'>Editar</a></li>";
                                    echo "<li><a href='#'>Reporte fotografico</a></li>";
                                    if ($tipo=='admin' or $tipo=='captador') {
                                        echo "<li><a href=#'>Cotizacion PDF</a></li>";

                                    }
                                  }
                                  if ($option=='reporte') {
                                    echo "<li><a href='../../proyectos/mostrar/informacion_proyecto.php?n_proyecto= $n_proyecto' class='active'>Informacion</a></li>";
                                    echo "<li><a href='../../proyectos/editar/editar_proyecto.php?n_proyecto= $n_proyecto#popup'>Editar</a></li>";
                                    echo "<li><a href='#'class='active'>Reporte fotografico</a></li>";
                                    if ($tipo=='admin' or $tipo=='captador') {
                                        echo "<li><a href=#'>Cotizacion PDF</a></li>";

                                    }
                                  }
                                  if ($option=='cotizacion') {
                                    echo "<li><a href='../../proyectos/mostrar/informacion_proyecto.php?n_proyecto= $n_proyecto' class='active'>Informacion</a></li>";
                                    echo "<li><a href='../../proyectos/editar/editar_proyecto.php?n_proyecto= $n_proyecto#popup'>Editar</a></li>";
                                    echo "<li><a href='#'>Reporte fotografico</a></li>";
                                    if ($tipo=='admin' or $tipo=='captador') {
                                        echo "<li><a href=#'class='active'>Cotizacion PDF</a></li>";

                                    }
                                  }
                                  if ($option=='editar') {
                                    echo "<li><a href='../../proyectos/mostrar/informacion_proyecto.php?n_proyecto= $n_proyecto' class='active'>Informacion</a></li>";
                                    echo "<li><a href='../../proyectos/editar/editar_proyecto.php?n_proyecto= $n_proyecto#popup'class='active'>Editar</a></li>";
                                    echo "<li><a href='#'>Reporte fotografico</a></li>";
                                    if ($tipo=='admin' or $tipo=='captador') {
                                        echo "<li><a href=#'>Cotizacion PDF</a></li>";

                                    }
                                  }
                                    ?>



                            </ul>


                            </body>
                            </html>
