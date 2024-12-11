<?php

function nav_item(string $link, string $title): string{
    $class = '';
    if($_SERVER['SCRIPT_NAME'] === $link){
        $class = 'current_page';
    }
    return <<<HTML
    <li>
        <a class="$class" href="$link">$title</a>
    </li>
HTML;
}