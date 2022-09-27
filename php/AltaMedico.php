<?php
    require_once("medico.php"); //llamando a otro archivo php
    //declaración de variables para recibir y guardar los datos enviados desde el formulario
    $nameMedico   = $_POST["nameMedico"];
    $first_name    = $_POST["firstName"];
    $email        = $_POST['email'];
    $curp         = $_POST["curp"];
    $domicilio    = $_POST["domicilio"];
    $telefono     = $_POST["telefono"];
    $especialidad = $_POST["especialidad"];
    $fechaCont    = $_POST["fechaContratacion"];
    $sexo         = $_POST["sexo"];
    $edad         = $_POST["edad"];
    $password     = $_POST["password"];

    $medico = new medico();

    $registro = $medico->set_registro( strtoupper($curp), $domicilio, $nameMedico, $first_name, $especialidad, $telefono, $fechaCont, $sexo, $edad, $password, $email);
    header('Location: ../altasMedicos.php');
?>