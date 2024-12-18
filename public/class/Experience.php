<?php

namespace App;
use App\Config\Config;

/**
 * Représente une expérience professionnelle
 * 
 * Cette classe encapsule les informations liées à une expérience,
 * telles que le rôle, l'entreprise, les dates, la description, etc.,
 * et permet de générer un affichage HTML
 */
class Experience{

    /**
     * @var int ID unique de l'expérience
     */
    private int $id;

    /**
     * @var string Rôle occupé pendant l'expérience
     */
    private string $role;

    /**
     * @var string Nom de l'entreprise
     */
    private string $company;

    /**
     * @var string Date de début de l'expérience
     */
    private string $start_date;

    /**
     * @var string Date de fin de l'expérience
     */
    private string $end_date;

    /**
     * @var string Ville où a eu lieu l'expérience
     */
    private string $city;

    /**
     * @var string Description de l'expérience
     */
    private string $description;

    /**
     * @var string Chemin complet vers le logo de l'expérience
     */
    private string $logo;

    /**
     * @var string Dossier contenant les logos liées aux expériences
     */
    private string $dir = Config::DIR['images'] . 'experience/';
        
    /**
     * Constructeur de la classe Experience
     * 
     * @param int $id ID unique de l'expérience.
     * @param string $role Rôle occupé pendant l'expérience.
     * @param string $company Nom de l'entreprise.
     * @param string $start_date Date de début de l'expérience.
     * @param string $end_date Date de fin de l'expérience.
     * @param string $city Ville où l'expérience a eu lieu.
     * @param string $description Description de l'expérience.
     * @param string $logo Nom du fichier logo associé.
     */
    public function __construct(
        int $id,
        string $role,
        string $company,
        string $start_date,
        string $end_date,
        string $city,
        string $description,
        string $logo
    ){
        $this->id = $id;
        $this->role = $role;
        $this->company = $company;
        $this->start_date = $start_date;
        $this->end_date = $end_date;
        $this->city = $city;
        $this->description = $description;
        $this->logo = $this->dir . $logo;
    }

        
    /**
     * Génère le code HTML pour afficher une expérience
     *
     * @return string Le code HTML de l'expérience
     */
    public function toHTML(){
        return <<<HTML
            <article class="experience_article">
                <div class="experience_image">
                    <img src="$this->logo" class="experience_img" alt="Logo de l'entreprise">
                </div>
                <div class="experience_content">
                    <h1>$this->role</h1>
                    <h3>$this->company</h3>
                    <h5>$this->start_date - $this->end_date</h5>
                    <h6>$this->city</h6>
                    <p>$this->description</p>
                </div>
            </article>
        HTML;
    }
}