<?php

namespace App;
use App\Config\Config;

class Experience{

    private int $id;
    private string $role;
    private string $company;
    private string $start_date;
    private string $end_date;
    private string $city;
    private string $description;
    private string $logo;

    private string $dir = Config::DIR['images'] . 'experience/';
    
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