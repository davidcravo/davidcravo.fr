<?php
    // header('Location: /templates/home.php');

    use App\Database\DbManager;
    use App\Config\Config;

    require_once __DIR__ . DIRECTORY_SEPARATOR . 'includes' .  DIRECTORY_SEPARATOR . 'init.php';

    // Création des tables
    $config = include __DIR__. DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'db_config.php';
    $db = new DbManager($config['host'], $config['dbname'], $config['user'], $config['password']);
    $directory = __DIR__ . DIRECTORY_SEPARATOR . 'sql' . DIRECTORY_SEPARATOR;

    if(!$db->table_exists('experience')){
        $db->create_table(file_get_contents(Config::DIR['sql'] . 'create_table_experience.sql'));
    }

    if(!$db->table_exists('education')){
        $db->create_table(file_get_contents(Config::DIR['sql'] . 'create_table_education.sql'));
    }

    if(!$db->table_exists('programing_languages')){
        $db->create_table(file_get_contents(Config::DIR['sql'] . 'create_table_programing_languages.sql'));
    }

    if(!$db->table_exists('frameworks')){
        $db->create_table(file_get_contents(Config::DIR['sql'] . 'create_table_frameworks.sql'));
    }

    if(!$db->table_exists('database')){
        $db->create_table(file_get_contents(Config::DIR['sql'] . 'create_table_database.sql'));
    }

    if(!$db->table_exists('tools')){
        $db->create_table(file_get_contents(Config::DIR['sql'] . 'create_table_tools.sql'));
    }

    if(!$db->table_exists('foreign_languages')){
        $db->create_table(file_get_contents(Config::DIR['sql'] . 'create_table_foreign_languages.sql'));
    }

    if(!$db->table_exists('achievements')){
        $db->create_table(file_get_contents(Config::DIR['sql'] . 'create_table_achievements.sql'));
    }

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    header('Location: /templates/home.php');