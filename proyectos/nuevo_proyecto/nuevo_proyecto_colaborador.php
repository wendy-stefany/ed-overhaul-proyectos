<?php include("../../barra_busqueda_y_pie.php"); ?>
<Doctype html>
<html>
    <head>
        <meta charset='utf-8' >
        <link rel="stylesheet" type="text/css" href="css.css" >
 <title>Alta Colaborador</title>

    </head>
<body>
</br>

<div class="formulario">
  <form  action="store_nuevo_proyecto_colaborador.php"method="post">
        <h2>Colaboradores</h2>
				<input name="num_colaborador" type="text" placeholder="#Colaborador" maxlength="30" pattern="[a-zA-Z0-9]+" required autofocus/>
				<input type="submit" value="Registrar">
</form>
<form  action="alta.html" method="post">
      <button id="back" name="back" type="submit" class="btn">Terminar</button>

</form>
  <div>

  </body>
</html>
