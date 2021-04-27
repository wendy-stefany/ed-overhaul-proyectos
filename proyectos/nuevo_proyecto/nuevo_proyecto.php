
<html>
    <head>
        <meta charset='utf-8' >
        <link rel="stylesheet" href="../css/css.css">
        <title>Nuevo proyecto</title>
        <?php include("../../barra_busqueda_y_pie.php"); ?>
    </head>
<body>
</br>
<div class="formulario">
  <form action="store_nuevo_proyecto.php" method="post" >
        <h2>Proyecto</h2>
        <label>Fecha levantamiento</label>
        <input name="fecha_levantamiento" type="date" placeholder="Habilidades" rows="6" required/>

        <label>Fecha de inicio</label>
				<input name="fecha_inicio" type="date" />

        <label>Fecha de finalizacion</label>
				<input name="fecha_finalizacion" type="date" placeholder="Habilidades" rows="6" />
      </br></br>
      &nbsp;&nbsp;&nbsp;&nbsp;
        <label>Fecha de rechazo</label>
				<input name="fecha_fechazo" type="date" placeholder="Habilidades" rows="6" />
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label>Estado</label>
        <select name="estado" >
           <option selected value="0"> Elige una opción </option>
           <option value="curso">Curso</option>
           <option value="terminado">Terminado</option>
           <option value="rechazado">Rechazado</option>
           <option value="espera">Espera</option>
        </select>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label>Supervisor</supervisor>
			  <select name='num_supervisor'>
          <option selected value="0"> Elige supervisor </option>
            <?php

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
         ?>
        </select>

        <h2>Cliente</h2>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <label>Numero de tienda</label>
        <input name="Tienda" type="text" placeholder="#Tienda" maxlength="30" pattern="[a-zA-Z0-9]+" />
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label>Sucursal</label>
        <input name="Sucursal" type="text" placeholder="Sucursal"  />
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label>Razon social</label>
        <input name="Razon" type="text" placeholder="Razon Social" maxlength="30" pattern="[a-zA-Z0-9]+" />
        </br></br>
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label>Nombre</label>
        <input name="Nombre" type="text" placeholder="Nombre" rows="6" required></input>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label>Apellido</label>
        <input name="Apellido" type="text" placeholder="Apellido" rows="6" required></input>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label>Telefono</label>
        <input name="Telefono" type="tel" placeholder="Telefono" rows="6" required></input>
        <h2>Cotizacion<h2>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <label>Incidencia</label>
        <input name="Incidencia" type="text" placeholder="Numero Incidencia" maxlength="30" required />

        <label>Tiempo de entrega</label>
        <input name="Tiempo" type="text" placeholder="Tiempo de Entrega"  required/>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <input type="submit" value="Siguiente">

</form>
  </div>

  </body>
</html>
