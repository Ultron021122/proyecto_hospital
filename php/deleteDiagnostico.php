<?php
    require_once('diagnostico.php');
    $diagnostico = new diagnostico();
    
    $ID = $_GET['id'];
    $username = $_GET['username'];

    $delete = $diagnostico->delete_registro($ID);
    header('Location: ../expediente.php?username='.$username);
?>