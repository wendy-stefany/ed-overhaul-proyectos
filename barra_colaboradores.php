<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../../csss/css.css">
<style>
</style>
</head>
<body>

<ul>
  <?php
      $tipo=($_GET['tipo']);

      if ($tipo=='supervisor') {
        echo "<li><a href='../../colaboradores/mostrar/colaboradores.php?tipo=supervisor' class='active'>Supervisores</a></li>";
        echo "<li><a href='../../colaboradores/mostrar/colaboradores.php?tipo=captador'>Captadores</a></li>";
        echo "<li><a href='../../colaboradores/mostrar/colaboradores.php?tipo=null'>Colaboradores</a></li>";


      }
      if ($tipo=='captador') {
        echo "<li><a href='../../colaboradores/mostrar/colaboradores.php?tipo=supervisor'>Supervisores</a></li>";
        echo "<li><a href='../../colaboradores/mostrar/colaboradores.php?tipo=captador' class='active'>Captadores</a></li>";
        echo "<li><a href='../../colaboradores/mostrar/colaboradores.php?tipo=null' >Colaboradores</a></li>";


      }
      if ($tipo=='null') {
        echo "<li><a href='../../colaboradores/mostrar/colaboradores.php?tipo=supervisor'>Supervisores</a></li>";
        echo "<li><a href='../../colaboradores/mostrar/colaboradores.php?tipo=captador'>Captadores</a></li>";
        echo "<li><a href='../../colaboradores/mostrar/colaboradores.php?tipo=null' class='active'>Colaboradores</a></li>";


      }



  ?>



</ul>


</body>
</html>
