<?php

function active($link){
    $class = '';
    if($_SERVER['REQUEST_URI'] === ('/' . $link)){
        $class = 'current_page';
    }
    return $class;
}