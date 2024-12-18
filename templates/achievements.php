<?php

    use App\Database\DbManager;
    use App\Achievement;

    require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'header.php';

    $config = include dirname(__DIR__) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'db_config.php';
    $db = new DbManager($config['host'], $config['dbname'], $config['user'], $config['password']);
    $projects = array_reverse($db->selectAll('achievements'));
?>

<main class="achievements_main">
    <?php 
        foreach($projects as $project){
            $achievement = new Achievement(
                $project['id'],
                $project['name'],
                $project['client'],
                $project['technologies'],
                $project['description'],
                $project['date'],
                $project['url'],
                $project['image']
            );
            echo $achievement->toHTML();
        }
    ?>   
</main>

<?php require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'footer.php'; ?>