<?php 
    $file = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'education.csv';
    $projects = array_reverse(get_csv_files($file, 'education'));
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