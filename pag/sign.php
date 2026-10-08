<?php
require "db/conexion.php";


if(isset($_POST['validar-usuario'])) {
    $userForm = $_POST['dni-form'];
    $pwForm = $_POST ['pw-form'];
    $userDb = "";
    $pwdb = "";
    $query = "SELECT * FROM usuario WHERE cedula = ' {$userForm}';";
    $usuarios = mysqli_query($conex,$query);

    if($usuarios->num_rows > 0 ){
        foreach ($usuarios as $usuario) {
            $userDb = $usuario['cedula'];
            $pwdb = $usuario['contrasena'];
        }
    $autenticado = password_verify($pwForm, $pwdb);
    if ($userForm === $userDb && $autenticado) {
        session_start();
        $_SESSION['cedula'] = $userDb;
        header("Location: pag/dashboard.php");
    }else{
        echo "Usuario o contraseña errada";
    }
    }else{
        echo "Usuario o contraseña errada";
    }
}
?>