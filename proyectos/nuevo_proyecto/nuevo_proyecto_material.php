<Doctype html>
<html>
    <head>
        <meta charset='utf-8' >
        <link rel="stylesheet" href="css/css.css">
        <?php include("../../barra_busqueda_y_pie.php"); ?>
 <title>Alta Proyecto</title>

    </head>
<body>
</br>
<div class="formulario">
  <form action="store_nuevo_proyecto_material.php" method="post" >
        <h2>Material<h2>
        <label>Cantidad</label>
        <input name="Material" type="text" placeholder="Cantidad Material" maxlength="30" pattern="[a-zA-Z0-9]+" required/>
        &nbsp;&nbsp;
        <label>Costo</label>
        <input name="Costo" type="text" placeholder="Costo Unitario"  required/>
        </br></br>
        <label>Concepto</label>
        </br>
        <textarea name="Concepto" placeholder="Concepto" rows="6" required></textarea>
        </br></br></br></br></br></br></br>
        <input type="submit" value="Registrar">
</form>
<form action="nuevo_proyecto_colaborador.php" method="post" >
      <button id="alta" name="Siguiente" type="submit" class="btn">Siguiente ></button>
</form>
  </div>

  </body>
</html>
