<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/room6/Controller/SubjectController.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/room6/Model/Subject.php";

$subjectController = new SubjectController();
$subjects = $subjectController->listSubjects();

if ($subjects) {
    foreach ($subjects as $subject) {
        $id = $subject->getId();
        echo "<tr>
                <td>{$id}</td>
                <td>{$subject->getName()}</td>
                <td>{$subject->getDescription()}</td>
                <td>{$subject->getMinimumPricing()}</td>
                <td><button id='d{$id}'>Update</button></td>
                <td><button onclick='deleteSubject({$id})'>Delete</button></td> 
              </tr>";
    }
} else {
    echo "<tr><td colspan='4'>No subjects found</td></tr>";
}

?>
