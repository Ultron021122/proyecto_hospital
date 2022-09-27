<?php
    require_once("medico.php"); //llamando a otro archivo php
    //declaración de variables para recibir y guardar los datos enviados desde el formulario
    $nameMedico   = $_POST["nameMedico"];
    $last_name    = $_POST["firstname"];
    $email        = $_POST['email'];
    $curp         = $_POST["curp"];
    $domicilio    = $_POST["domicilio"];
    $telefono     = $_POST["telefono"];
    $especialidad = $_POST["especialidad"];
    $fechaCont    = $_POST["fechaContratacion"];
    $sexo         = $_POST["sexo"];
    $edad         = $_POST["edad"];

    $medico = new medico();

    $registro = $medico->modificar_registro($curp, $domicilio, $nameMedico, $last_name, $especialidad, $telefono, $fechaCont, $sexo, $edad, $email);
    header('Location: ../consultasMedico.php');
?>