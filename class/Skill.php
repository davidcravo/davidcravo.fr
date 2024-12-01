<?php
class Skill{

    private string $name ;
    private string $logo;
    private string $description;

    public function __construct(string $name, string $logo, string $description)
    {
       $this->name = $name;
       $this->logo = "../assets/images/skills/" . $logo;
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