<?php
    require_once("paciente.php");
    $paciente = new paciente();

    $CURP = $_GET['id'];

    $delete = $paciente->delete_registro($CURP);
    header('Location: ../consultasPaciente.php');
?>