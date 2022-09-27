<?php

    require_once('sesion.php');
    $session = new session();

    $username = $_POST["username"];
    $password = $_POST["contraseña"];

    $session->start($username, $password);
?>