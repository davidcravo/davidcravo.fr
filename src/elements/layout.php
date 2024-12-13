<?php
    require_once dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'constants.php';
?>
<!DOCTYPE html>
<html lang="fr-fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?? 'David CRAVO'?></title>
    <meta name="description" content="<?= $pageDescription ?? '' ?>">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pinyon+Script&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <link rel="stylesheet" href="/assets/css/site.css">
    <link rel="stylesheet" href="/assets/css/layout.css">
    <link rel="stylesheet" href="/assets/css/achievements.css">
    <link rel="stylesheet" href="/assets/css/contact.css">
    <link rel="stylesheet" href="/assets/css/home.css">
    <link rel="stylesheet" href="/assets/css/experience.css">
    <link rel="stylesheet" href="/assets/css/education.css">
    <link rel="stylesheet" href="/assets/css/skills.css">

    <link rel="icon" href="/assets/images/david_cravo_logo.jpeg">

    <!-- <script src="/assets/js/home.js" defer></script> -->
    <!-- <script src="/assets/js/menu.js" defer></script> -->
    <script src="https://kit.fontawesome.com/f129c06877.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

</head>
<body>
    <header class="header">
        <div class="gradient">
            <div class="logo">
                <a href="<?= $router->generate('home') ?>"><img src="/assets/images/david_cravo_logo.jpeg" alt="Mon logo"></a>
            </div>
            <div class="links">
                <a href="<?= LINKS['github'] ?>" target="_blank"><img src="../assets/images/header/github.png" alt="logo Github"></a>
                <a href="<?= LINKS['linkedin'] ?>" target="_blank"><img src="/assets/images/header/linkedin.png" alt="logo Linkedin"></a>
            </div>
            <nav class="menu">
                <a class="menu-item <?= active('') ?>" href="<?= $router->generate('home') ?>">Accueil</a>
                <a class="menu-item <?= active('experience') ?>" href="<?= $router->generate('experience') ?>">Expériences</a>
                <a class="menu-item <?= active('education') ?>" href="<?= $router->generate('education') ?>">Formations</a>
                <a class="menu-item <?= active('skills') ?>" href="<?= $router->generate('skills') ?>">Compétences</a>
                <a class="menu-item <?= active('achievements') ?>" href="<?= $router->generate('achievements') ?>">Réalisations</a>
                <a class="menu-item <?= active('contact') ?>" href="<?= $router->generate('contact') ?>">Contact</a>
            </nav>
            <div class="links">
                <a href="<?= $router->generate('logout') ?>"><img src="/assets/images/header/login.png" alt="Logo connexion"></a>
            </div>
        </div>
    </header>

        <?php 
            echo $pageContent
        ?>

    <footer>
        <a href="https://davidcravo.fr/" target="_blank">David CRAVO</a>
        <div class="footer_links">
            <a href="<?= LINKS['github'] ?>" target="_blank"><img src="../assets/images/footer/github.png" alt="logo Github"></a>
            <a href="<?= LINKS['linkedin'] ?>" target="_blank"><img src="/assets/images/footer/linkedin.png" alt="logo Linkedin"></a>
        </div>
        <div class="footer_date">2024</div>
    </footer>
</body>
</html>