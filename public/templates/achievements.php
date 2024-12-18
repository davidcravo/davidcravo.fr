<<<<<<< HEAD:public/templates/achievements.php
<?php 
    $file = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'achievements.csv';
    $projects = array_reverse(get_csv_files($file, 'achievements'));
?>

<main class="achievements_main">
    <?php foreach($projects as $project): ?>
        <article class="achievements_article">
            <div class="achievements_image">
                <a href="<?= $project['url'] ?>" target="_blank">
                    <img src="<?= $project['image']?>" class="achievements_img" alt="Image du projet">
                </a>
            </div>
            <div class="achievements_content">
                <h1><?= $project['name'] ?></h1>
                <h3><?= $project['technologies'] ?></h3>
                <h5><?= $project['date']?></h5>
                <p><?= $project['description'] ?></p>
                <button class="styled"><a href="<?= $project['url'] ?>" target="_blank">Voir</a></button>
            </div>
        </article>
    <?php endforeach ?>
</main>
=======
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
>>>>>>> database:templates/achievements.php
