<?php

namespace App;

use App\Config\Config;

/**
 * Classe représentant une compétence.
 *
 * Cette classe encapsule les informations relatives à une compétence, 
 * telles que son nom, son logo, et sa description, 
 * et génère un affichage HTML pour la présenter.
 */
class Skill{

    /**
     * @var int ID unique de la compétence.
     */
    private int $id;

    /**
     * @var string Nom de la compétence.
     */
    private string $name ;

    /**
     * @var string Chemin vers le logo de la compétence.
     */
    private string $logo;

    /**
     * @var string Description de la compétence.
     */
    private string $description;

    /**
     * @var string Dossier contenant les images des compétences.
     */
    private string $dir = Config::DIR['images'] .'skills/';

    /**
     * Constructeur de la classe Skill.
     *
     * @param int $id ID unique de la compétence.
     * @param string $name Nom de la compétence.
     * @param string $logo Nom du fichier logo de la compétence.
     * @param string $description Description de la compétence.
     */
    public function __construct(int $id, string $name, string $logo, string $description)
    {
        $this->id = $id;
        $this->name = $name;
        $this->logo = $this->dir . $logo;
        $this->description = $description;
    }

    /**
     * Génère le code HTML pour afficher la compétence.
     *
     * @return string Code HTML représentant la compétence.
     */
    public function toHTML(){
        return <<<HTML
            <li class="skills_container">
                <img class="skills_image" src="$this->logo" alt="$this->description" title="$this->name"><br>
                <span class="skills_comment">$this->name</span>
            </li>
        HTML;
    }
}