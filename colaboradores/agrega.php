<Doctype html>
<html>
    <head>
        <meta charset='utf-8' >
        <link rel="stylesheet" href="../css/css.css">

 <title>Alta Proyecto</title>
    </head>
<body>
<div class="formulario_editar">
            <div id="popup" class="overlay">
                    <div id="popupBody">
                      <img src='../css/img/anadir.png'>
                      <h2>Colaboradores</h2>
                      <a id="cerrar" href="../proyectos/mostrar/informacion_proyecto.php?n_proyecto=<?php $n_proyecto=($_GET['n_proyecto']);
                      echo "$n_proyecto" ?>">&times;</a>
                      <div class="popupContent">
                        <form action="store/store_agregar_colaborador.php?n_proyecto=<?php $n_proyecto=($_GET['n_proyecto']);
                        echo "$n_proyecto" ?>" method="post">
                        <select name="n_colaborador">
                        <?php
                            $n_proyecto=($_GET['n_proyecto']);
                            require_once ('..\conexion.php');
                            $conexion=conectarBD();
                            $query ="SELECT* from colaboradores";
                            $resultado=pg_query($conexion,$query) or die ("Error en la consulta");//y esta linea es practicamente el query
                            $nr=pg_num_rows($resultado);
                            if($nr>0){
                                while ($filas=pg_fetch_array($resultado)) {
                                    $num_colaborador=$filas['num_colaborador'];
                                    $nombre=$filas['nombre'];
                                    $apellido=$filas['apellido'];
                                    $habilidad=$filas['habilidad'];
                                    echo "<option value='$num_colaborador'>$nombre $apellido-$habilidad</option>";
      }
                                }
                              ?>
                              </select>
                            </br></br></br>
                            <button id="alta" name="alta" type="submit" class="btn">Agregar</button>
                          </form>
                        </div>
                    </div>
                </div>

  </div>

  </body>
</html>
