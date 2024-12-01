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
        <script src="/assets/js/script_skills.js" defer></script>
</head>

<body>