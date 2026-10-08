<?php
 include "../../db/conexion.php";
 

 $idUser = $_GET ['id'];
 $query = "DELETE FROM usuarios WHERE  id_usuario = " . $idUser . ";";
 $resultado = mysqli_query($conex, $query);
//  var_dump($resultado);
//  foreach ( $resultado as $data) {
//     var_dump($data);
//  }

$state = ($resultado) ? 4 : 5 ;
header ("Location: ../../pag/users.php?state=$state");
exit;