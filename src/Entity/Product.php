<?php
namespace App\Entity;

class Product {
    private $id;
    private $slug;
    private $name;
    private $price;
    private $description;
    private $imgUrl;

    public function __construct(
        $id,
        $slug,
        $name,
        $price,
        $description,
        $imgUrl
    ) {
        $this->id = $id;
        $this->slug = $slug;
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->imgUrl = $imgUrl;
    }

    public function getId () {
        return $this->id;
    }

    public function getSlug () {
        return $this->slug;
    }

    public function getName () {
        return $this->name;
    }

    public function setName ($name) {
        return $this->name = $name;
    }

    public function getPrice () {
        return $this->price;
    }

    public function getDescription () {
        return $this->description;
    }

    public function getImgUrl () {
        return $this->imgUrl;
    }
}