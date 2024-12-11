<?php

$link = $router->generate('dashboard');
$error = null;
$password = '$2y$16$wPvSOM2lQyR944vc45xY6uoHh0VRmKoaY6x8UlGDy8kYIxBDxywh.';

if(!empty($_POST['log_email']) && !empty($_POST['password'])){
    if($_POST['log_email'] === 'john.doe@email.com' && password_verify($_POST['password'], $password)){
        $_SESSION['log_in'] = 1;
        header('Location: ' . $link);
    }else{
        $error = 'Identifiants incorrects';
    }
}

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'functions' . DIRECTORY_SEPARATOR . 'authentification.php';
if(is_log_in()){
    header('Location: ' . $link);
    exit();
}

?>

<main class="main_login">
    <?php if($error): ?>
        <div class="alert alert-danger">
            <?= $error ?>
        </div>
    <?php endif; ?>

    <form action="" method="post">
        <div class="form-group">
            <input class="form-control" type="email" name="log_email" id="log_email" placeholder="Votre email de connexion">
        </div>
        <div class="form-group">
            <input class="form-control" type="password" name="password" id="password" placeholder="Votre mot de passe">
        </div>
        <button type="submit" class="btn btn-primary">Se connecter</button>
    </form>
</main>
