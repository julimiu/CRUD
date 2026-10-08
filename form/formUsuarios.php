<?php
require  __DIR__ . '/../includes/users/create.php';

// require __DIR__ ."../includes/funciones.php";

// require_once '../db/funciones.php';
// session_start();
$errores = "";
if (isset($_POST['agregar'])){
    $errores = create_user();
}

$usuarios = obtener_usuarios();
// $addUser = create_user();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de usuarios</title>
</head>
<body>
    <h2>Registro de Usuarios</h2>

    <?php

if($errores) {
    foreach ($errores as $error) {
        echo "<p>" . $error . "<p>";
    }
}
    ?>
    
    
 <form action="" method="post">
<label for= "name">Nombre:</label>
<input type="text" name="name" id="name"> <br><br>

<label for= "last_name">Apellido:</label>
<input type="text" name="last_name" id="last_name"> <br><br>

 <label for="email">Email:</label>
  <input type="email" name="email" id="email"> <br><br>

<label for="cedula">Cedula:</label>
<input type="text" name="cedula" id="cedula"> <br><br>

<label for="phone">Teléfono:</label>
  <input type="text" name="phone" id="phone"> <br><br>

<label for="password">Contraseña:</label>
 <input type="password" name="password" id="password"> <br><br>

 <label for="c_password">Confirmar Contraseña:</label>
<input type="password" name="c_password" id="c_password"> <br><br>


<button type="submit" name="agregar">Guardar Cliente</button>
</form>

    
</body>
</html>