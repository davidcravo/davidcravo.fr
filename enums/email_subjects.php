<?php

enum Subject: int{
    case Internship = 0;
    case WorkStudy = 1;
    case Job = 2;
    case Other = 3;

    public function label(): string{
        return match($this){
            self::Internship => 'Stage',
            self::WorkStudy => 'Alternance',
            self::Job => 'Emploi',
            self::Other => 'Autre'
        };
    }

    public static function getSubjects(): array{
        return [
            self::Internship->label(), //value => 'Stage',
            self::WorkStudy->label(), //value => 'Alternance',
            self::Job->label(), //value => 'Emploi',
            self::Other->label() //value => 'Autre'
        ];
    }
}