<?php


/**
 * Classe pour gérer un compteur de visites.
 *
 * Cette classe permet d'incrémenter, récupérer et analyser les données de visite
 * stockées dans des fichiers spécifiques, avec un support pour des statistiques mensuelles.
 */
class Counter{

    /**
     * @var string Chemin vers le fichier où le compteur est stocké.
     */
    private $file;

    /**
     * Constructeur de la classe Counter.
     *
     * @param string $file Chemin vers le fichier de stockage du compteur.
     */
    public function __construct(string $file)
    {
        $this->file = $file;
    }

    /**
     * Incrémente le compteur de visites.
     *
     * Si le fichier de compteur existe, incrémente sa valeur. Sinon, initialise le compteur à 1.
     *
     * @return void
     */
    public function increment(): void
    {
        $counter = 1;
        if(file_exists($this->file)){
            $counter = (int)file_get_contents($this->file);
            $counter++;
        }
        file_put_contents($this->file, $counter);
    }

    /**
     * Récupère la valeur actuelle du compteur.
     *
     * @return int La valeur actuelle du compteur ou 0 si le fichier n'existe pas.
     */
    public function recover(): int
    {
        if(!file_exists($this->file)){
            return 0;
        }
        return file_get_contents($this->file);
    }

    /**
     * Récupère le total des visites pour un mois donné.
     *
     * Cette méthode calcule la somme des visites enregistrées pour un mois spécifique.
     *
     * @param int $year Année (format YYYY).
     * @param int $month Mois (format MM, sans zéro initial nécessaire).
     * @return int Le total des visites pour le mois donné.
     */
    public function recover_month(int $year, int $month): int{
        $month = str_pad($month, 2, '0', STR_PAD_LEFT);
        $file = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'statistics' . DIRECTORY_SEPARATOR . 'counter-' . $year . '-' . $month . '-' . '*';
        $files = glob($file);
        $total = 0;
        foreach($files as $file){
            $total += file_get_contents($file);
        }
        return $total;
    }

    /**
     * Récupère les détails journaliers des visites pour un mois donné.
     *
     * Cette méthode retourne un tableau associatif contenant les visites journalières
     * pour un mois spécifique.
     *
     * @param int $year Année (format YYYY).
     * @param int $month Mois (format MM, sans zéro initial nécessaire).
     * @return array Tableau associatif contenant les visites par jour.
     *               Chaque élément contient :
     *               - 'day' : Jour du mois.
     *               - 'total' : Nombre total de visites ce jour-là.
     */
    public function recover_month_details(int $year, int $month): array{
        $month = str_pad($month, 2, '0', STR_PAD_LEFT);
        $file = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'statistics' . DIRECTORY_SEPARATOR . 'counter-' . $year . '-' . $month . '-' . '*';
        $files = glob($file);
        $visits = [];
        foreach($files as $file){
            $parts = explode('-', basename($file));
            $visits[] = [
                'day' => $parts[3],
                'total' => file_get_contents($file)
            ];
        }
        return $visits;
    }
}