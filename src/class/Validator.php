<?php

class Validator {

    private $data = [];
    private $errors = [];

    public function __construct($data){
        $this->data = $data;
    }

    public function check($name, $rule, $options = false){
        $validator = "validate_$rule";
        if(!$this->$validator($name, $options)){
            $this->errors[$name] = "Le champs $name n'a pas été rempli correctement";
        }
    }

    public function validate_required($name){
        return array_key_exists($name, $this->data) && $this->data[$name] != '';
    }

    public function validate_email($name){
        return array_key_exists($name, $this->data) && filter_var($this->data[$name], FILTER_VALIDATE_EMAIL);
    }

    public function validate_in($name, $options){
        return array_key_exists($name, $this->data) && in_array($this->data[$name], $options);
    }

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

    public function validate_regex($name){
        $regex = new Regex();
        $pattern = $regex->choose_regex($name);
        return array_key_exists($name, $this->data) && preg_match($pattern, $this->data[$name]);
    }

    public function errors(){
        return $this->errors;
    }
}