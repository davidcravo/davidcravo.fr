<?php

namespace App;

use App\Config\Config;

class Achievement{

    private int $id;
    private string $name;
    private string $client;
    private string $technologies;
    private string $description;
    private string $date;
    private string $url;
    private string $image;

    private $dir = Config::DIR['images'] . 'achievements/';

    public function __construct(
        int $id,
        string $name,
        string $client,
        string $technologies,
        string $description,
        string $date,
        string $url,
        string $image
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->client = $client;
        $this->technologies = $technologies;
        $this->description = $description;
        $this->date = $date;
        $this->url = $url;
        $this->image = $this->dir . $image;
    }

    public function toHTML(){
        return <<<HTML
            <article class="achievements_article">
                <div class="achievements_image">
                    <a href="$this->url" target="_blank">
                        <img src="$this->image" class="achievements_img" alt="Image du projet">
                    </a>
                </div>
                <div class="achievements_content">
                    <h1>$this->name</h1>
                    <h3>$this->technologies</h3>
                    <h5>$this->date</h5>
                    <p>$this->description</p>
                    <button class="styled"><a href="$this->url" target="_blank">Voir</a></button>
                </div>
            </article>
        HTML;
    }
}