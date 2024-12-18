<?php
    $title = $title ?? "David CRAVO";
    $description = $description ?? "Mon site Web"
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