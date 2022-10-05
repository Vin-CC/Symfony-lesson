<?php
namespace App\Entity;

class User {
    private $name;
    private $surname;

    function __construct($name, $surname) {
        $this->name = $name;
        $this->surname = $surname;
    }

    function getName() {
        return $this->name;
    }

    function getSurname() {
        return $this->surname;
    }
}