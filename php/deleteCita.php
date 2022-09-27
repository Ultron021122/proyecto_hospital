<?php
    require_once("cita.php");
    $cita = new citas();

    $Codigo = $_GET['id'];

    $delete = $cita->delete_registro($Codigo);
    header('Location: ../consultasCita.php');
?>