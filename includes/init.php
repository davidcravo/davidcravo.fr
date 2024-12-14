<?php

if(session_status() === PHP_SESSION_NONE){
    session_start();
}

ini_set('display_errors', 0);
    ini_set('display_startup_errors', 0);
    error_reporting(E_ALL);

require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'functions' . DIRECTORY_SEPARATOR . 'get_csv_files.php';
require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'functions' . DIRECTORY_SEPARATOR . 'functions_skills.php';
require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'db_config.php';


require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR .'Form.php';
require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR .'Regex.php';
require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR .'Validator.php';
require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR .'Skill.php';
require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR .'Counter.php';


require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'enums' . DIRECTORY_SEPARATOR . 'email_subjects.php';
require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'enums' . DIRECTORY_SEPARATOR . 'input_values.php';

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'constants.php';

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'captcha' . DIRECTORY_SEPARATOR . 'autoload.php';