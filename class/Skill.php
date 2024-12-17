<?php

namespace App;

use App\Config\Config;

class Skill{

    private int $id;
    private string $name ;
    private string $logo;
    private string $description;

    private string $dir = Config::DIR['images'] .'skills/';

    public function __construct(int $id, string $name, string $logo, string $description)
    {
        $this->id = $id;
        $this->name = $name;
        $this->logo = $this->dir . $logo;
        $this->description = $description;
    }

    public function skill_html(){
        return <<<HTML
            <li class="skills_container">
                <img class="skills_image" src="$this->logo" alt="$this->description" title="$this->name"><br>
                <span class="skills_comment">$this->name</span>
            </li>
        HTML;
    }
}