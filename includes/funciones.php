<?php

require 'app.php';

function incluirTemplates( string $nombre, bool $inicio = false ) {
    include TEMPLATES_URL . "/{$nombre}.php"; 
}

$existe = isset($auth);

function estaAutenticado() : bool {
    session_start();

    $auth = $_SESSION['login'] ?? false;
    if ($auth = true) {
        return true;
    }
    return false;
}