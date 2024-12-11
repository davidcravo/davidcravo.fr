<?php
class Form{

    private $data = [];

    public function __construct($data = []){
        $this->data = $data;
    }

    private function getValue($name){
        $value = "";
        if(isset($this->data[$name])){
            $value = $this->data[$name];
        }
        return $value;
    }

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

    public function inputText($name, $label){
        return $this->input('text', $name, $label);
    }

    public function inputEmail($name, $label){
        return $this->input('email', $name, $label);
    }

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

    public function textarea($name, $label){
        return $this->input('textarea', $name, $label);
    }
}