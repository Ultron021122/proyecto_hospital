<?php
    session_start();
    require_once("diagnostico.php"); //llamando a otro archivo php
    //declaración de variables para recibir y guardar los datos enviados desde el formulario
    $CURP_paciente  = $_GET['username'];
    $ID             = $_GET['id'];
    $Fecha_aten     = $_POST['fechaDiagnostico'];
    $Hora_aten      = $_POST['horaDiagnostico'];
    $observacion    = $_POST['observacion'];

    $diagnostico = new diagnostico();

    $modificar = $diagnostico->modify_registro($Fecha_aten, $Hora_aten, $observacion, $ID);
    header('Location: ../expediente.php?username='.$CURP_paciente);
?>