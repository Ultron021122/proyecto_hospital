<?php
require_once("cita.php"); //llamando a otro archivo php
//declaración de variables para recibir y guardar los datos enviados desde el formulario
$CURP_paciente = $_POST['curp_paciente'];
$CURP_medico   = $_POST['curp_medico'];
$Fecha_aten    = $_POST['fechaAtencion'];
$Hora_aten     = $_POST['horaAtencion'];

$cita = new citas();

$registro = $cita->set_registro($CURP_paciente, $CURP_medico, $Fecha_aten, $Hora_aten);
header('Location: ../altasCitas.php')

?>