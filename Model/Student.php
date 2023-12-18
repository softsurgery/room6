<?php

class Student {
    private $id;
    private $firstName;
    private $lastName;
    private $dob;
    private $section;

    public function __construct($id, $firstName, $lastName, $dob, $section) {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->dob = $dob;
        $this->section = $section;
    }

    public function getId() {
        return $this->id;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function getDob() {
        return $this->dob;
    }

    public function getSection() {
        return $this->section;
    }

    public function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    public function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    public function setDob($dob) {
        $this->dob = $dob;
    }

    public function setSection($section) {
        $this->section = $section;
    }
}

?>
