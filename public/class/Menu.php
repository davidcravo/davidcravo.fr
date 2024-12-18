<?php

namespace App;

/**
 * Classe représentant un élément de menu.
 *
 * Cette classe permet de générer un élément HTML de menu avec un lien et un titre,
 * tout en ajoutant une classe CSS pour indiquer la page actuelle.
 */
class Menu{

    /**
     * @var string Lien de navigation.
     */
    private string $link;
    
    /**
     * @var string Titre affiché dans le menu.
     */
    private string $title;

    /**
     * Constructeur de la classe Menu.
     *
     * @param string $link Lien de navigation.
     * @param string $title Titre affiché dans le menu.
     */
    public function __construct(string $link, string $title){
        $this->link = $link;
        $this->title = $title;
    }

    /**
     * Génère le code HTML pour un élément de menu.
     *
     * Ajoute une classe CSS "current_page" si l'élément correspond à la page actuelle.
     *
     * @return string Code HTML de l'élément de menu.
     */
    function toHTML(): string{
        $class = '';
        if($_SERVER['SCRIPT_NAME'] === $this->link){
            $class = 'current_page';
        }
        return <<<HTML
            <li>
                <a class="$class" href="$this->link">$this->title</a>
            </li>
        HTML;
    }
}

