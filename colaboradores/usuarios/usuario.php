<Doctype html>
<html>
    <head>
        <meta charset='utf-8' >
        <link rel="stylesheet" href="css/css.css">
        <title>Usuarios</title>
        <?php include("../../barra_busqueda_y_pie.php"); ?>
    </head>
<body>
  <div class="editar_colaborador">
    <img src='../../css/img/informacion.png'>
      <div class="formulario_editar">
              <h2>informacion</h2>
                <?php
                $num_colaborador=$_GET['n_colaborador'];

                require_once ('..\..\conexion.php');
                $conexion=conectarBD();

                $query ="SELECT* from colaboradores where num_colaborador='$num_colaborador'";
                $resultado=pg_query($conexion,$query) or die ("Error en la consulta");//y esta linea es practicamente el query
                $nr=pg_num_rows($resultado);

                if($nr>0){
                              echo "<form action='store_usuarios.php?num_colaborador=$num_colaborador' method='post'>";
                                    $filas=pg_fetch_array($resultado);

                                    echo"<label># Colaborador $num_colaborador</label>&nbsp;&nbsp;";

                                    echo"</br></br><label>Nombre</label>&nbsp;&nbsp;";
                                    echo"<input name='nombre' type='text' value='".$filas["nombre"]."' >";

                                    echo"</br></br><label>Apellido</label>&nbsp;&nbsp;";
                                    echo"<input name='apellido' type='text' value='".$filas["apellido"]."' >";

                                    echo"</br></br><label>Habiliades</label>&nbsp;&nbsp;";
                                    echo"<input name='habilidad' type='text' value='".$filas["habilidad"]."' >";


                        }
                ?>

      </div>
    </div>
    <div class="editar_usuario">
      <img src='../../css/img/usuario.png'>
          <div class="formulario_editar">

                <h2>Usuario</h2>
                  <?php
                  $query ="SELECT* from usuarios where num_colaborador='$num_colaborador'";
                  $resultado=pg_query($conexion,$query) or die ("Error en la consulta");//y esta linea es practicamente el query
                  $nr=pg_num_rows($resultado);

                                    $filas=pg_fetch_array($resultado);
                                      echo"</br></br><label>Usuario</label>&nbsp;&nbsp;";
                                      echo"<input name='usuario' type='text' value='".$filas["usuario"]."' >";

                                      echo"</br></br><label>Contraseña</label>&nbsp;&nbsp;";
                                      echo"<input name='contrasena' type='password' value='".$filas["contrasena"]."' >";

                                      echo"</br></br><label>Tipo</label>&nbsp;&nbsp;";
                                      echo"<select name='tipo'>
                                         <option selected value='".$filas["tipo"]."'>".$filas["tipo"]."</option>
                                         <option value='supervisor'>Supervisor</option>
                                         <option value='captador'>Captador</option>
                                         <option value='admin'>Administrador</option>
                                      </select>";


                                      echo"</br></br><input type='submit' value='Guardar'>";
                                echo "</form>";

                  ?>

      </div>
    </div>





  </body>
</html>
