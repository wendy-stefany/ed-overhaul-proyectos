<?php
require_once ('conexion.php');
$conexion=conectarBD();

$username=$_POST['username'];
$password=$_POST['password'];
session_start();
$_SESSION['username']=$username;

/*guarda nombre de usuario*/



$query="SELECT*FROM usuarios where usuario='$username' and contrasena='$password'";
$resultado=pg_query($conexion,$query) or die ("Error en la consulta");
$nr=pg_num_rows($resultado);

if($nr){

  session_start();
      if (isset($_SESSION['username'])) {
          //asignar a variable
          $usernameSesion = $_SESSION['username'];
          //asegurar que no tenga "", <, > o &
          $username1 = htmlspecialchars($usernameSesion);
        }
    $query="SELECT tipo FROM usuarios WHERE usuario='$username' and tipo='captador'";
    $resultado=pg_query($conexion,$query) or die ("Error en la consulta");
    $tipo=pg_num_rows($resultado);

    if ($tipo>0) {
      header("location:proyectos/mostrar/proyectos.php?estado=curso");
    }
    else {
      header("location:proyectos/mostrar/proyectos.php?estado=curso");
    }


}else{
    include("index.html");

  ?>

  <h1 class="bad">ERROR DE AUTENTIFICACION</h1>

  <?php
}
