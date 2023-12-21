<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/room6/Controller/SubjectController.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/room6/Model/Subject.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $description = $_POST["description"];
    $minimumPricing = $_POST["minimumPricing"];

    $subjectController = new SubjectController();
    $subject = new Subject(null, $name, $description, $minimumPricing);

    if ($subjectController->addSubject($subject)) {
        echo "success";
    } else {
        echo "error";
    }
} else {
    echo "Invalid request method";
}
