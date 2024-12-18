<?php

namespace App\Config;

/**
 * Classe de configuration pour le projet.
 *
 * Cette classe fournit des constantes globales pour les chemins et autres paramètres nécessaires
 * dans l'application.
 */
class Config{

    /**
     * Constante contenant les chemins importants de l'application.
     *
     * @var array<string, string>
     * - 'images' : Chemin vers le dossier contenant les images.
     * - 'sql' : Chemin vers le dossier contenant les fichiers SQL.
     */
    public const DIR = [
        'images' => '/assets/images/',
        'sql' => '/sql/'
    ];

    /**
     * Constante contenant les liens externes importants.
     *
     * @var array<string, string>
     * - 'github' : Lien vers le profil GitHub.
     * - 'linkedin' : Lien vers le profil LinkedIn.
     */
    public const LINKS = [
        'github' => 'https://github.com/davidcravo',
        'linkedin' => 'https://www.linkedin.com/in/davidcravo/'
    ];

    /**
     * Constante contenant les titres des catégories de compétences.
     *
     * @var array<string, string>
     * - 'programing_languages' : Titre pour les langages de programmation.
     * - 'frameworks' : Titre pour les frameworks et CMS.
     * - 'database' : Titre pour les bases de données.
     * - 'tools' : Titre pour les méthodes et outils.
     * - 'foreign_languages' : Titre pour les langues étrangères.
     */
    public const SKILLS_TITLES = [
        'programing_languages' => 'Langage de programmation',
        'frameworks' => 'Frameworks et CMS',
        'database' => 'Base de données',
        'tools' => 'Méthodes et outils',
        'foreign_languages' => 'Langues étrangères'
    ];
}