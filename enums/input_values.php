<?php

enum InputValue: string {
    case Firstname = 'firstname';
    case Lastname = 'lastname';
    case Role = 'role';
    case Company = 'company';

    public function label(): string{
        return match($this){
            self::Firstname => "Prénom",
            self::Lastname => "Nom",
            self::Role => "Fonction",
            self::Company => "Entreprise"
        };
    }

    public static function getInputKeysValues(): array{
        return [
            self::Firstname->value => self::Firstname->label(),
            self::Lastname->value => self::Lastname->label(),
            self::Role->value => self::Role->label(),
            self::Company->value => self::Company->label()
        ];
    }
}