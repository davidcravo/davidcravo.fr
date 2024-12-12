<?php 
    $file = dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'experience.csv';
    $jobs = array_reverse(get_csv_files($file, 'experience'));
?>

<main class="experience_main">
    <?php foreach($jobs as $job): ?>
        <article class="experience_article">
            <div class="experience_image">
                <img src="<?= $job['logo']?>" class="experience_img" alt="Logo de l'entreprise">
            </div>
            <div class="experience_content">
                <h1><?= $job['role'] ?></h1>
                <h3><?= $job['company'] ?></h3>
                <h5><?= $job['start_date'] ?> - <?= $job['end_date'] ?></h5>
                <h7><?= $job['city'] ?></h7>
                <p><?= $job['description'] ?></p>
            </div>
        </article>
    <?php endforeach ?>
</main>
