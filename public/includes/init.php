<?php

if(session_status() === PHP_SESSION_NONE){
    session_start();
}

<<<<<<< HEAD:public/includes/init.php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);
=======
ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'functions' . DIRECTORY_SEPARATOR . 'get_csv_files.php';
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'functions' . DIRECTORY_SEPARATOR . 'functions_skills.php';
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'db_config.php';
>>>>>>> database:includes/init.php

require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'functions' . DIRECTORY_SEPARATOR . 'get_csv_files.php';
require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'functions' . DIRECTORY_SEPARATOR . 'active.php';

require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR .'Form.php';
require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR .'Regex.php';
require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR .'Validator.php';
require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR .'Skill.php';
require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR .'Counter.php';
require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR . 'Experience.php';
//require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR . 'Achievement.php';
require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR . 'database' . DIRECTORY_SEPARATOR . 'DbManager.php';
require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'Config.php';

<<<<<<< HEAD:public/includes/init.php
require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'enums' . DIRECTORY_SEPARATOR . 'email_subjects.php';
require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'enums' . DIRECTORY_SEPARATOR . 'input_values.php';
=======

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'enums' . DIRECTORY_SEPARATOR . 'email_subjects.php';
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'enums' . DIRECTORY_SEPARATOR . 'input_values.php';
>>>>>>> database:includes/init.php

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'constants.php';

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'captcha' . DIRECTORY_SEPARATOR . 'autoload.php';