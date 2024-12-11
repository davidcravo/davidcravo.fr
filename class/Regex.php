<?php

class Regex{

    public function choose_regex($field){
        switch($field){
            case 'firstname': //InputValues::Firstname->label():
            case 'lastname': //InputValues::Lastname:
            case 'role': //InputValues::Role:
                $pattern = "/^[a-zA-ZÀ-ÖØ-öø-ÿ\-\'\s]+$/u";
                break;
            case 'company': //InputValues::Company:
                $pattern = "/^[a-zA-ZÀ-ÖØ-öø-ÿ0-9\-\'\s]+$/u";
                break;
            default:
                $pattern = "/^[a-zA-ZÀ-ÖØ-öø-ÿ0-9\.,!?@\'\"()\s\-]+$/u";
                break;
        }
        return $pattern;
    }
}