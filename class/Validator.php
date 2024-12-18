<?php

/**
 * Classe pour valider des données issues d'un formulaire.
 *
 * Cette classe offre des méthodes de validation courantes (champs requis, email, regex, etc.)
 * et gère les erreurs associées aux champs invalides.
 */
class Validator {

    /**
     * @var array Données du formulaire à valider.
     */
    private $data = [];

    /**
     * @var array Liste des erreurs générées lors de la validation.
     */
    private $errors = [];

    /**
     * Constructeur de la classe Validator.
     *
     * @param array $data Données du formulaire à valider.
     */
    public function __construct($data){
        $this->data = $data;
    }

    /**
     * Valide un champ du formulaire selon une règle donnée.
     *
     * @param string $name Nom du champ à valider.
     * @param string $rule Règle de validation (ex : 'required', 'email', 'regex').
     * @param mixed $options Options supplémentaires pour certaines validations (ex : liste pour 'in').
     * @return void
     */
    public function check($name, $rule, $options = false){
        $validator = "validate_$rule";
        if(!$this->$validator($name, $options)){
            $this->errors[$name] = "Le champs $name n'a pas été rempli correctement";
        }
    }

    /**
     * Valide si un champ est requis et non vide.
     *
     * @param string $name Nom du champ.
     * @return bool True si le champ est valide, sinon False.
     */
    public function validate_required($name){
        return array_key_exists($name, $this->data) && $this->data[$name] != '';
    }

    /**
     * Valide si un champ contient une adresse email valide.
     *
     * @param string $name Nom du champ.
     * @return bool True si le champ est valide, sinon False.
     */
    public function validate_email($name){
        return array_key_exists($name, $this->data) && filter_var($this->data[$name], FILTER_VALIDATE_EMAIL);
    }

    /**
     * Valide si la valeur d'un champ est dans une liste donnée.
     *
     * @param string $name Nom du champ.
     * @param array $options Liste des valeurs autorisées.
     * @return bool True si la valeur est dans la liste, sinon False.
     */
    public function validate_in($name, $options){
        return array_key_exists($name, $this->data) && in_array($this->data[$name], $options);
    }

    /**
     * Valide un champ via le reCAPTCHA v2.
     *
     * @param string $name Nom du champ (souvent 'g-recaptcha-response').
     * @return bool True si la validation est réussie, sinon False.
     */
    public function validate_checked($name){
        if(isset($_POST['submit'])){
            $recaptcha = new \ReCaptcha\ReCaptcha('6LdxWlMqAAAAAPYV66WkQ5zqglAP_IxHVJWfE2fM');
            $gRecaptchaResponse = $_POST['g-recaptcha-response'];
            $remoteIp = $_SERVER['REMOTE_ADDR'];
            $resp = $recaptcha->setExpectedHostname('davidcravo.fr')
                            ->verify($gRecaptchaResponse, $remoteIp);
            if ($resp->isSuccess()) {
                return true;
            } else {
                $errors = $resp->getErrorCodes();
                return false;
            }
        }
    }

    /**
     * Valide un champ en utilisant une expression régulière personnalisée.
     *
     * @param string $name Nom du champ.
     * @return bool True si la validation réussit, sinon False.
     */
    public function validate_regex($name){
        $regex = new Regex();
        $pattern = $regex->choose_regex($name);
        return array_key_exists($name, $this->data) && preg_match($pattern, $this->data[$name]);
    }

    /**
     * Retourne la liste des erreurs de validation.
     *
     * @return array Tableau associatif des erreurs (clé = nom du champ, valeur = message d'erreur).
     */
    public function errors(){
        return $this->errors;
    }
}