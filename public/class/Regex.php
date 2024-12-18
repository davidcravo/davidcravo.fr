<?php

/**
 * Classe pour générer des expressions régulières adaptées à différents champs de formulaire.
 *
 * Cette classe permet de retourner un pattern d'expression régulière spécifique en fonction du champ de formulaire fourni.
 */
class Regex{

    /**
     * Retourne le pattern d'expression régulière adapté à un champ de formulaire.
     *
     * @param string $field Le nom du champ pour lequel une regex est requise.
     *                      Les champs reconnus sont :
     *                      - 'firstname' : Pour un prénom (lettres, espaces, apostrophes, tirets).
     *                      - 'lastname' : Pour un nom de famille (mêmes règles que 'firstname').
     *                      - 'role' : Pour un rôle ou une fonction (lettres, espaces, apostrophes, tirets).
     *                      - 'company' : Pour un nom d'entreprise (lettres, chiffres, espaces, apostrophes, tirets).
     *                      - Autres : Une regex plus générique permettant des caractères spéciaux.
     * @return string Le pattern d'expression régulière correspondant au champ.
     */
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