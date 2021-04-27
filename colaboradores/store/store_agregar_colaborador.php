<?php
  require_once ('..\..\conexion.php');
  $conexion=conectarBD();
  $n_proyecto=($_GET['n_proyecto']);
  $n_colaborador= $_POST['n_colaborador'];
  $query ="select *from colaborador_proyecto where num_proyecto=$n_proyecto and num_colaborador=$n_colaborador";
  $resultado=pg_query($conexion,$query);
  if(pg_num_rows($resultado)>0){
     }
     else
     {
       $query2 ="insert into colaborador_proyecto (num_proyecto,num_colaborador) values ($n_proyecto,$n_colaborador)";
       pg_query($conexion,$query2);
    }

    header("Location:../agrega.php?n_proyecto=$n_proyecto#popup");

?>
