<?php

require_once "../Controller/SubjectController.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $subjectController = new SubjectController();
    $success = $subjectController->deleteSubject($id);
    echo $success ? 'success' : 'error';
} else {
    echo 'Invalid request';
}

?>
