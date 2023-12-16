<?php

class Subject {
    private $id;
    private $name;
    private $description;
    private $minimumPricing;

    public function __construct($id, $name, $description, $minimumPricing) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->minimumPricing = $minimumPricing;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getMinimumPricing() {
        return $this->minimumPricing;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setMinimumPricing($minimumPricing) {
        $this->minimumPricing = $minimumPricing;
    }
}

?>
