<?php
    require_once("paciente.php"); //llamando a otro archivo php
    //declaración de variables para recibir y guardar los datos enviados desde el formulario
    $namePaciente = $_POST["namePaciente"];
    $last_name    = $_POST["firstName"];
    $curp         = $_POST["curp"];
    $domicilio    = $_POST["domicilio"];
    $telefono     = $_POST["telefono"];
    $sexo         = $_POST["sexo"];
    $edad         = $_POST["edad"];
    $email        = $_POST["email"];

    $paciente = new paciente();

    $registro = $paciente->set_registro($namePaciente, $last_name, strtoupper($curp), $domicilio, $telefono, $sexo, $edad, $email);
    header('Location: ../altasPacientes.php');
?>