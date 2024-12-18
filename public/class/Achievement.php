<?php

namespace App;

use App\Config\Config;

/**
 * Représente une réalisation (achievement) d'un projet ou d'une mission.
 *
 * Cette classe encapsule les informations d'une réalisation, telles que le nom, 
 * le client, les technologies utilisées, une description, une date, et un lien associé.
 * Elle génère également un affichage HTML de ces informations.
 */
class Achievement{

    /**
     * @var int ID unique de la réalisation.
     */
    private int $id;

    /**
     * @var string Nom du projet ou de la réalisation.
     */
    private string $name;

    /**
     * @var string Nom du client associé à la réalisation.
     */
    private string $client;

    /**
     * @var string Technologies utilisées pour la réalisation.
     */
    private string $technologies;

    /**
     * @var string Description détaillée de la réalisation.
     */
    private string $description;

    /**
     * @var string Date de la réalisation (format YYYY-MM-DD).
     */
    private string $date;

    /**
     * @var string URL vers le projet ou la réalisation.
     */
    private string $url;

    /**
     * @var string Chemin vers l'image associée à la réalisation.
     */
    private string $image;

    /**
     * @var string Répertoire des images des réalisations.
     */
    private $dir = Config::DIR['images'] . 'achievements/';

    /**
     * Constructeur de la classe Achievement.
     *
     * @param int $id ID unique de la réalisation.
     * @param string $name Nom du projet ou de la réalisation.
     * @param string $client Nom du client associé.
     * @param string $technologies Technologies utilisées pour le projet.
     * @param string $description Description de la réalisation.
     * @param string $date Date de la réalisation (format YYYY-MM-DD).
     * @param string $url URL vers le projet ou la réalisation.
     * @param string $image Nom du fichier image associé.
     */
    public function __construct(
        int $id,
        string $name,
        string $client,
        string $technologies,
        string $description,
        string $date,
        string $url,
        string $image
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->client = $client;
        $this->technologies = $technologies;
        $this->description = $description;
        $this->date = $date;
        $this->url = $url;
        $this->image = $this->dir . $image;
    }
    
    /**
     * Génère le code HTML pour afficher les informations de la réalisation.
     *
     * @return string Code HTML contenant les informations de la réalisation.
     */
    public function toHTML(){
        return <<<HTML
            <article class="achievements_article">
                <div class="achievements_image">
                    <a href="$this->url" target="_blank">
                        <img src="$this->image" class="achievements_img" alt="Image du projet">
                    </a>
                </div>
                <div class="achievements_content">
                    <h1>$this->name</h1>
                    <h3>$this->technologies</h3>
                    <h5>$this->date</h5>
                    <p>$this->description</p>
                    <button class="styled"><a href="$this->url" target="_blank">Voir</a></button>
                </div>
            </article>
        HTML;
    }
}