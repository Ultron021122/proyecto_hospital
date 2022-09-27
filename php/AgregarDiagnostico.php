<?php
    session_start();
    require_once("diagnostico.php"); //llamando a otro archivo php
    //declaración de variables para recibir y guardar los datos enviados desde el formulario
    $CURP_paciente  = $_GET['username'];
    $CURP_medico    = $_SESSION['username'];
    $Num_expediente = $_GET['num'];
    $Fecha_aten     = $_POST['fechaDiagnostico'];
    $Hora_aten      = $_POST['horaDiagnostico'];
    $observacion    = $_POST['observacion'];

    $diagnostico = new diagnostico();

    $agregar = $diagnostico->set_registro($Num_expediente, $Fecha_aten, $Hora_aten, $observacion, $CURP_medico); 
    header('Location: ../expediente.php?username='.$CURP_paciente);
?>