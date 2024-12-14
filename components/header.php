<?php
    $title = $title ?? "David CRAVO";
    $description = $description ?? "Mon site Web"
?>
<?php 
    require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'constants.php';
    require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'functions' . DIRECTORY_SEPARATOR . 'navigation.php';
?>

<!DOCTYPE html>
<html lang="fr-fr">

<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= htmlentities($title) ?></title>
        <meta name="description" content="<?= htmlentities($description) ?>">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        <link rel="stylesheet" href="/assets/css/style_home.css">
        <link rel="stylesheet" href="/assets/css/style_body.css">
        <link rel="stylesheet" href="/assets/css/style_achievements.css">
        <link rel="stylesheet" href="/assets/css/style_contact.css">
        <link rel="stylesheet" href="/assets/css/style_education.css">
        <link rel="stylesheet" href="/assets/css/style_experience.css">
        <link rel="stylesheet" href="/assets/css/style_profile.css">
        <link rel="stylesheet" href="/assets/css/style_skills.css">
        <link rel="stylesheet" href="/assets/css/style_header.css">
        <link rel="stylesheet" href="/assets/css/style_footer.css">
        <link rel="icon" href="../assets/images/david_cravo_logo.jpeg">

        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

        <script src="/assets/js/script_skills.js" defer></script>
</head>

<body>
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