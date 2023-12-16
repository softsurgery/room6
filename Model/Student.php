<?php

class Student {
    private $id;
    private $firstName;
    private $lastName;
    private $dob;
    private $section;

    // Constructor
    public function __construct($id, $firstName, $lastName, $dob, $section) {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->dob = $dob;
        $this->section = $section;
    }

    // Getter methods
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

    // Setter methods
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

// Example usage:
$student1 = new Student(1, 'John', 'Doe', '2003-05-15', 'A');
echo "Student 1: {$student1->getFirstName()} {$student1->getLastName()}, DOB: {$student1->getDob()}, Section: {$student1->getSection()}";
?>
