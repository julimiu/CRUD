<?php
include __DIR__ . "/../../db/conexion.php";
// include __DIR__ . "../../includes/funciones.php";
// include __DIR__ . "/../../includes/funciones.php";

//
$idUser = $_GET['id'];
$errores = [];

$query = "SELECT * FROM usuarios WHERE id_usuario = " . $idUser . ";";
$resultado = mysqli_query($conex,$query);
$usuario = mysqli_fetch_assoc($resultado);

if (isset($_POST['editar'])){
 $name= mysqli_real_escape_string($conex, $_POST['name']);
 $last_name= mysqli_real_escape_string($conex, $_POST['last_name']);
 $cedula= mysqli_real_escape_string($conex, $_POST['cedula']);
 $email= mysqli_real_escape_string($conex, $_POST['email']);
 $phone= mysqli_real_escape_string($conex, $_POST['phone']);
 $password= $_POST['password'];
 $c_password= $_POST['c_password'];

var_dump($password, $c_password);

  if (!$name || !$last_name || !$cedula || !$email || !$phone){
        $errores[] = "Todos los campos son obligatorios";
    }
    if ($password != $c_password){
        $errores[] = "Las contraseñas no coinciden";
    }
 
    if (!$errores){
        $query = "UPDATE usuarios SET cedula = '$cedula', nombre = '$name', apellido = '$last_name', email = '$email', telefono = '$phone'";
        if ($password){
            $query .= ", contrasena = '" . password_hash($password, PASSWORD_BCRYPT) . "'";
        }
        $query .= " WHERE id_usuario = " . $idUser . ";";
 
        $resultado = mysqli_query($conex, $query);
        $state = ($resultado) ? 2 : 3;
        header("Location: ../../pag/users.php?state=$state");
        exit;
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Editar usuario</title>
</head>
<body>
    <h2>Editar Usuario</h2>
 
    <?php
    foreach ($errores as $error) {
        echo "<p>" . $error . "</p>";
    }
    ?>
 
    <form action="" method="post">
        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" value="<?php echo $usuario['nombre']; ?>"> <br><br>
 
        <label for="last_name">Apellido:</label>
        <input type="text" name="last_name" id="last_name" value="<?php echo $usuario['apellido']; ?>"> <br><br>
 
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?php echo $usuario['email']; ?>"> <br><br>
 
        <label for="cedula">Cedula:</label>
        <input type="text" name="cedula" id="cedula" value="<?php echo $usuario['cedula']; ?>"> <br><br>
 
        <label for="phone">Telefono:</label>
        <input type="text" name="phone" id="phone" value="<?php echo $usuario['telefono']; ?>"> <br><br>

        <label for="password">Nueva contraseña:</label>
        <input type="password" name="password" id="password"> <br><br>
 
        <label for="c_password">Confirmar contraseña:</label>
        <input type="password" name="c_password" id="c_password"> <br><br>
 
        <button type="submit" name="editar">Guardar cambios</button><br><br>
    </form>

    <a href="../../pag/users.php">Volver a usuarios</a>
</body>
</html>