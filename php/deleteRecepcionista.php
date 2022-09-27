<?php
    require_once("recepcionista.php");
    $recepcionista = new reception();

    $CURP = $_GET['id'];

    $delete = $recepcionista->delete_registro($CURP);
    header('Location: ../consultasRecepcionista.php');
?>