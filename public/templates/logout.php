<?php
$link = $router->generate('login');
// $link = $router->generate('home');

session_start();
unset($_SESSION['log_in']);
header('Location: ' . $link);