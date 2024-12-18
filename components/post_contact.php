<?php

require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'init.php';

$errors = [];
$validator = new validator($_POST);
$validator->check('firstname', 'required');
$validator->check('firstname', 'regex');
$validator->check('lastname', 'required');
$validator->check('lastname', 'regex');
$validator->check('role', 'required');
$validator->check('role', 'regex');
$validator->check('company', 'required');
$validator->check('company', 'regex');
$validator->check('email', 'email');
$validator->check('subject', 'in', array_keys(Subject::getSubjects()));
$validator->check('message', 'required');
$validator->check('message', 'regex');
$validator->check('captcha', 'checked');
$errors = $validator->errors();

if(!empty($errors)){
    $_SESSION['errors'] = $errors;
    $_SESSION['inputs'] = $_POST;
    header('Location: ../templates/contact.php');
}else{
    $_SESSION['success'] = 1;
    $to = 'contact@davidcravo.fr';
    $subject = Subject::from($_POST['subject'])->label();
    $message = 'PRENOM : ' .    htmlspecialchars(trim($_POST['firstname']), ENT_QUOTES, 'UTF-8') . ', '
        . 'NOM : ' .            htmlspecialchars(trim($_POST['lastname']), ENT_QUOTES, 'UTF-8') . ', '
        . "FONCTION : " .       htmlspecialchars(trim($_POST['role']), ENT_QUOTES, 'UTF-8') . ', '
        . "ENTREPRISE : " .     htmlspecialchars(trim($_POST['company']), ENT_QUOTES, 'UTF-8') . ', '
        . "CONTENU : " .        htmlspecialchars(trim($_POST['message']));
    $headers = "FROM: " .       htmlspecialchars(trim($_POST['email']), ENT_QUOTES, 'UTF-8');
    mail($to, $subject, $message, $headers);
    
    header('Location: ../templates/contact.php');
}