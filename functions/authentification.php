<?php 
function is_log_in(): bool{
    if(session_status() === PHP_SESSION_NONE){
        session_start();
    }
    return !empty($_SESSION['log_in']);
}

function user_log_in(): void{
    if(!is_log_in()){
        header('Location: /templates/login.php');
        exit();
    }
}