<?php
require_once("cita.php"); //llamando a otro archivo php
//declaración de variables para recibir y guardar los datos enviados desde el formulario
$CURP_paciente = $_POST['curp_paciente'];
$CURP_medico   = $_POST['curp_medico'];
$Fecha_aten    = $_POST['fechaAtencion'];
$Hora_aten     = $_POST['horaAtencion'];
$Codigo_cita   = $_POST['codigo'];

$cita = new citas();

$registro = $cita->modificar_registro($CURP_paciente, $CURP_medico, $Fecha_aten, $Hora_aten, $Codigo_cita);
header('Location: ../altasCitas.php')

?>