<?php

session_start();
include __DIR__ . '/./controllers/Rotas.php';

$rotas = new Rotas();
$rotas->requestHandle();
?>