<<<<<<< HEAD:public/templates/education.php
<?php 
    $file = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'education.csv';
    $projects = array_reverse(get_csv_files($file, 'education'));
=======
<?php

    use App\Database\DbManager;

    require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'header.php';
    require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';
    require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR . 'database' . DIRECTORY_SEPARATOR . 'DbManager.php';

    $config = include dirname(__DIR__) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'db_config.php';
    $db = new DbManager($config['host'], $config['dbname'], $config['user'], $config['password']);
    $projects = array_reverse($db->selectAll('education'));
>>>>>>> database:templates/education.php
?>

<main class="education_main">
    <?php foreach($projects as $project): ?>
        <article class="education_article">
            <div class="education_image">
                <img src="<?= $project['image']?>" class="education_img" alt="Image du centre de formation">
            </div>
            <div class="education_content">
                <h1><?= $project['name'] ?></h1>
                <h5><?= $project['date'] ?></h5>
            </div>
        </article>
    <?php endforeach ?>
</main>