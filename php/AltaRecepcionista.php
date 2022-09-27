<?php
    require_once("recepcionista.php"); //llamando a otro archivo php
    //declaración de variables para recibir y guardar los datos enviados desde el formulario
    $nameEmpleado = $_POST["nameEmpleado"];
    $first_name    = $_POST["firstName"];
    $curp         = $_POST["curp"];
    $domicilio    = $_POST["domicilio"];
    $telefono     = $_POST["telefono"];
    $fechaCont    = $_POST["fechaContratacion"];
    $sexo         = $_POST["sexo"];
    $edad         = $_POST["edad"];
    $email        = $_POST["email"];
    $password     = $_POST["password"];

    $recepcionista = new reception();

    $registro = $recepcionista->set_registro( strtoupper($curp), $nameEmpleado, $first_name, $domicilio, $telefono, $fechaCont, $sexo, $edad, $email, $password);
    if($registro) {
        echo "Registro realizado correctamente";
    } else {
        echo "Fallo al intentar registrar el recepcionista";
    }
    header("Location: ../altasRecepcionista.php");
?>