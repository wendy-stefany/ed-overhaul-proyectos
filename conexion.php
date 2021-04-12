<?php
  function conectarBD(){
  $host="host=localhost";
  $port="port=5432";
  $dbname="dbname=EDOVERHAUL-CONTROL";
  $user="user=postgres";
  $password="password=123";

  $bd = pg_connect("$host $port $dbname $user $password");
  if(!$bd){
    echo "Eror: ".pg_lest_error;
  }else {
    return $bd;}
}
 ?>
