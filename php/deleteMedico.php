<?php
    require_once("medico.php");
    $medico = new medico();

    $CURP = $_GET['id'];

    $delete = $medico->delete_registro($CURP);
    header('Location: ../consultasMedico.php');
?>