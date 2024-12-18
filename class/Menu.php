<?php

namespace App;

class Menu{

    private string $link;
    private string $title;

    public function __construct(string $link, string $title){
        $this->link = $link;
        $this->title = $title;
    }

    function toHTML(): string{
        $class = '';
        if($_SERVER['SCRIPT_NAME'] === $this->link){
            $class = 'current_page';
        }
        return <<<HTML
            <li>
                <a class="$class" href="$this->link">$this->title</a>
            </li>
        HTML;
    }
}

