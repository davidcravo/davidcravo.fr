<?php 
    require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'constants.php';
    require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'functions' . DIRECTORY_SEPARATOR . 'navigation.php';
?>

<header>
    <div class="gradient">
        <a href="../templates/home.php">
            <img src="../assets/images/david_cravo_logo.jpeg" alt="Logo de David CRAVO">
        </a>
        <div class="links">
            <a href="<?= LINKS['github'] ?>" target="_blank"><img src="../assets/images/header/github.png" alt="logo Github"></a>
            <a href="<?= LINKS['linkedin'] ?>" target="_blank"><img src="/assets/images/header/linkedin.png" alt="logo Linkedin"></a>
        </div>
        <nav >
            <ul>
                <?= nav_item('/templates/home.php', 'Acceuil') ?>
                <?= nav_item('/templates/experience.php', 'Expérience') ?>
                <?= nav_item('/templates/education.php', 'Formations') ?>
                <?= nav_item('/templates/skills.php', 'Compétences') ?>
                <?= nav_item('/templates/achievements.php', 'Réalisations') ?>
                <?= nav_item('/templates/contact.php', 'Contact') ?>
                <?= nav_item('/templates/dashboard.php', 'Dashboard') ?>
            </ul>
        </nav>
        <div class="links">
            <a href="/templates/logout.php"><img src="/assets/images/header/login.png" alt="Logo connexion"></a>
        </div>
    </div>
</header>            