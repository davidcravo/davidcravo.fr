<<<<<<< HEAD:public/templates/skills.php
<?php 
    $programming_languages_file = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'programing_languages.csv';
    $programming_languages = get_csv_files($programming_languages_file, 'programming_languages');
=======
<?php

    use App\Database\DbManager;
    use App\Config\Config;
    use App\Skill;

    require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'header.php';

    $config = include dirname(__DIR__) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'db_config.php';
    $db = new DbManager($config['host'], $config['dbname'], $config['user'], $config['password']);

>>>>>>> database:templates/skills.php
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