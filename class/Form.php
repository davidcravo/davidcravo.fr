<?php

/**
 * Classe pour générer des formulaires HTML dynamiques.
 *
 * Cette classe permet de créer facilement des champs de formulaire (texte, email, textarea, etc.),
 * avec la gestion des valeurs par défaut pour la réaffichage en cas d'erreur.
 */
class Form{

    /**
     * @var array Les données associées au formulaire (valeurs par défaut).
     */
    private $data = [];

    /**
     * Constructeur de la classe Form.
     *
     * @param array $data Les données initiales pour remplir les champs du formulaire.
     */
    public function __construct($data = []){
        $this->data = $data;
    }

    /**
     * Récupère la valeur d'un champ du formulaire.
     *
     * @param string $name Nom du champ à récupérer.
     * @return string La valeur du champ ou une chaîne vide si non définie.
     */
    private function getValue($name){
        $value = "";
        if(isset($this->data[$name])){
            $value = $this->data[$name];
        }
        return $value;
    }

    /**
     * Génère un champ de formulaire (input ou textarea).
     *
     * @param string $type Type du champ (text, email, textarea, etc.).
     * @param string $name Nom du champ.
     * @param string $label Label associé au champ.
     * @return string Code HTML du champ de formulaire.
     */
    private function input($type, $name, $label){
        $value = $this->getValue($name);
        if ($type == 'textarea'){
            $input = "<textarea name=\"$name\" id=\"$name\">$value</textarea>";
        }else{
            $input = "<input type=\"$type\" id=\"$name\" name=\"$name\" value=\"$value\">";
        }
        return "<label for=\"$name\">$label *</label>
        $input";
    }

    /**
     * Génère un champ de texte.
     *
     * @param string $name Nom du champ.
     * @param string $label Label associé au champ.
     * @return string Code HTML du champ de texte.
     */
    public function inputText($name, $label){
        return $this->input('text', $name, $label);
    }

    /**
     * Génère un champ de type email.
     *
     * @param string $name Nom du champ.
     * @param string $label Label associé au champ.
     * @return string Code HTML du champ email.
     */
    public function inputEmail($name, $label){
        return $this->input('email', $name, $label);
    }

    /**
     * Génère une liste déroulante (select).
     *
     * @param string $name Nom de la liste déroulante.
     * @param string $label Label associé à la liste déroulante.
     * @param array $options Tableau associatif des options (clé => valeur affichée).
     * @return string Code HTML de la liste déroulante.
     */
    public function select($name, $label, $options){
        $options_html = "";
        $value = $this->getValue($name);
        foreach($options as $k => $v){
            $selected = "";
            if($value == $k){
                $selected = ' selected';
            }
            $options_html .= "<option value=\"$k\"$selected>$v</option>";
        }
        return "<label for\"$name\">$label</label>
            <select name=\"$name\" id=\"$name\">$options_html</select>";
    }

    /**
     * Génère un champ de type textarea.
     *
     * @param string $name Nom du champ.
     * @param string $label Label associé au champ.
     * @return string Code HTML du champ textarea.
     */
    public function textarea($name, $label){
        return $this->input('textarea', $name, $label);
    }
}