<?php 
    $file = dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'achievements.csv';
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