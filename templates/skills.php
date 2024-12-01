<?php 
    include dirname(__DIR__) . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'init.php';

    require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'head.php';
    require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'header.php';

    $programming_languages_file = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'programing_languages.csv';
    $programming_languages = get_csv_files($programming_languages_file, 'programming_languages');
?>

<main class="skills_main">
    <article class="skills_article">
        <?php foreach(SKILLS_TITLES as $k => $skill_title): ?>
            <h1><?= $skill_title ?></h1>
            <?php 
                $file = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . $k . '.csv';
                $$skill_title = get_csv_files($file, $k);
            ?>
            <ul>
                <?php 
                    foreach($$skill_title as $skill_title)
                    {
                        $skill = new Skill($skill_title['name'], $skill_title['logo'], $skill_title['description']); 
                        echo $skill->skill_html();
                    }; 
                ?>
            </ul>
        <?php endforeach ?>
    </article>
</main>       

<?php require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'footer.php'; ?>