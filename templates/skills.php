<?php

    use App\Database\DbManager;
    use App\Config\Config;
    use App\Skill;

    require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'header.php';

    $config = include dirname(__DIR__) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'db_config.php';
    $db = new DbManager($config['host'], $config['dbname'], $config['user'], $config['password']);

?>

<main class="skills_main">
    <article class="skills_article">
        <?php foreach(Config::SKILLS_TITLES as $k => $skill_title): ?>
            <h1><?= $skill_title ?></h1>
            <?php 
                $$skill_title = $db->selectAll($k);
            ?>
            <ul>
                <?php 
                    foreach($$skill_title as $skill_title)
                    {
                        $skill = new Skill($skill_title['id'], $skill_title['name'], $skill_title['logo'], $skill_title['description']); 
                        echo $skill->toHTML();
                    };
                ?>
            </ul>
        <?php endforeach ?>
    </article>
</main>       

<?php require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'footer.php'; ?>