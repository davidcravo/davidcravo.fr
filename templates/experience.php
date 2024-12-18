<?php

    use App\Database\DbManager;
    use App\Experience;

    require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'header.php';
    
    $config = include dirname(__DIR__) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'db_config.php';
    $db = new DbManager($config['host'], $config['dbname'], $config['user'], $config['password']);
    $jobs = array_reverse($db->selectAll('experience'));
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

<?php require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'footer.php';  ?>
