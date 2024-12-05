<?php

session_start();
unset($_SESSION['log_in']);
header('Location: /templates/login.php');