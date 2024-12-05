<?php
    include dirname(__DIR__) . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'init.php';

    require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'head.php';
    require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'header.php';
?>

<main class="contact_main">
    <?php if(array_key_exists('errors', $_SESSION)): ?>
        <div>
            <?= implode('<br>', $_SESSION['errors']); ?>
        </div>
    <?php endif; ?>
    <?php if(array_key_exists('success', $_SESSION)): ?>
        <div>
            Votre message a bien été envoyé.
        </div>
    <?php endif; ?>
    <form action="../components/post_contact.php" method="POST">
        <?php
            $form = new Form(isset($_SESSION['inputs']) ? $_SESSION['inputs'] : []);
            $inputValues = inputValue::getInputKeysValues();
            foreach($inputValues as $k => $v){
                echo $form->inputText($k, $v);
            }
        ?>
        <?= $form->inputEmail('email', 'Email'); ?>
        <?= $form->select('subject', 'Objet', Subject::getSubjects()); ?>
        <?= $form->textarea('message', 'Message'); ?>
        <div class="g-recaptcha" data-sitekey="6LdxWlMqAAAAANKbXKdFkH27nX0ykShBuYhID0Uh"></div>
        <button type="submit" name="submit">Envoyer</button>
    </form>
</main>

<?php 
    require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'footer.php'; 

    unset($_SESSION['errors']); 
    unset($_SESSION['inputs']);
    unset($_SESSION['success']);
?>