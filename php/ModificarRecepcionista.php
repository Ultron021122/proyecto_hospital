<?php
    require_once("recepcionista.php"); //llamando a otro archivo php
    //declaración de variables para recibir y guardar los datos enviados desde el formulario
    $nameEmpleado   = $_POST["nameEmpleado"];
    $last_name      = $_POST["firstname"];
    $email          = $_POST['email'];
    $curp           = $_POST["curp"];
    $domicilio      = $_POST["domicilio"];
    $telefono       = $_POST["telefono"];
    $fechaCont      = $_POST["fechaContratacion"];
    $sexo           = $_POST["sexo"];
    $edad           = $_POST["edad"];

    $recepcionista = new reception();

    $registro = $recepcionista->modificar_registro($curp, $nameEmpleado, $last_name, $domicilio, $telefono, $fechaCont, $sexo, $edad, $email);
    header('Location: ../consultasRecepcionista.php');
?>