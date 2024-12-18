<<<<<<< HEAD:public/templates/experience.php
<?php 
    $file = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'experience.csv';
    $jobs = array_reverse(get_csv_files($file, 'experience'));
=======
<?php

    use App\Database\DbManager;
    use App\Experience;

    require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'header.php';
    
    $config = include dirname(__DIR__) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'db_config.php';
    $db = new DbManager($config['host'], $config['dbname'], $config['user'], $config['password']);
    $jobs = array_reverse($db->selectAll('experience'));
>>>>>>> database:templates/experience.php
?>

<main class="experience_main">
    <?php 
    foreach($jobs as $job){ 
        $experience = new Experience(
            (int)$job['id'],
            $job['role'],
            $job['company'],
            $job['start_date'],
            $job['end_date'],
            $job['city'],
            $job['description'],
            $job['logo']
        );
        echo $experience->toHTML();
    }
    ?>
</main>
<<<<<<< HEAD:public/templates/experience.php
=======

<?php require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'footer.php';  ?>
>>>>>>> database:templates/experience.php
