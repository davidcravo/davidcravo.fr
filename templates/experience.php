<?php
    // require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

    // include dirname(__DIR__) . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'init.php';

    // require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'head.php';
    require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'header.php';

    require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR . 'DbManager.php';

    use Database\DbManager;

    $config = include dirname(__DIR__) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'db_config.php';
    $db = new DbManager($config['host'], $config['dbname'], $config['user'], $config['password']);

    $sql = "SELECT * FROM experience";
    $jobs = array_reverse($db->db_sql($sql));
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

<?php require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'footer.php';  ?>
