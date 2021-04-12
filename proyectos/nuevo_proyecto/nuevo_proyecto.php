
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
        &nbsp;&nbsp;
        <label>Fecha de inicio</label>
				<input name="fecha_inicio" type="date" />
        &nbsp;&nbsp;
        <label>Fecha de finalizacion</label>
				<input name="fecha_finalizacion" type="date" placeholder="Habilidades" rows="6" />
      </br></br>
        <label>Fecha de rechazo</label>&nbsp;&nbsp;&nbsp;&nbsp;
				<input name="fecha_fechazo" type="date" placeholder="Habilidades" rows="6" />
        &nbsp;&nbsp;
        <label>Estado</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <select name="estado" >
           <option selected value="0"> Elige una opción </option>
           <option value="curso">Curso</option>
           <option value="terminado">Terminado</option>
           <option value="rechazado">Rechazado</option>
           <option value="espera">Espera</option>
        </select>
        <label>Numero de Supervisor</supervisor>
				<input name="num_supervisor" type="num" placeholder="Numero supervisor" rows="6" required/>
        </br></br>

        <h2>Cliente</h2>
        <label>Numero de tienda</label>
        <input name="Tienda" type="text" placeholder="#Tienda" maxlength="30" pattern="[a-zA-Z0-9]+" />
        &nbsp;&nbsp;
        <label>Sucursal</label>
        <input name="Sucursal" type="text" placeholder="Sucursal"  />
        &nbsp;&nbsp;
        <label>Razon social</label>
        <input name="Razon" type="text" placeholder="Razon Social" maxlength="30" pattern="[a-zA-Z0-9]+" />
        </br></br>
        <label>Nombre</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input name="Nombre" type="text" placeholder="Nombre" rows="6" required></input>
        &nbsp;&nbsp;
        <label>Apellido</label>
        <input name="Apellido" type="text" placeholder="Apellido" rows="6" required></input>
        &nbsp;&nbsp;
        <label>Telefono</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input name="Telefono" type="tel" placeholder="Telefono" rows="6" required></input>
        <h2>Cotizacion<h2>
        <label>Numero de incidencia</label>
        <input name="Incidencia" type="text" placeholder="Numero Incidencia" maxlength="30" required />
        &nbsp;&nbsp;
        <label>Tiempo de entrega</label>
        <input name="Tiempo" type="text" placeholder="Tiempo de Entrega"  required/>

        <input type="submit" value="Siguiente >">

</form>
  </div>

  </body>
</html>
