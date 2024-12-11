<?php

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'constants.php';

function skills_html(string $key){
    $sentence = [];
    foreach(SKILLS[$key] as $skills){
        $sentence[] = $skills;
    }
    $li = implode(', ', $sentence);
    return <<<HTML
        <p> $li </p>
HTML;
}