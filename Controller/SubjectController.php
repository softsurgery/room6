<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/room6/utils/connect.php";


class SubjectController{
    protected $conn;
    
    public function __construct(){
        $this->conn = connect();
    }

    public function listSubjects(){
        try {
            $list = $this->conn->query("SELECT id, name, description, minimum_pricing FROM subjects");
            $subjects = [];
            while ($row = $list->fetch_assoc()) {
                $subject = new Subject($row['id'], $row['name'], $row['description'], $row['minimum_pricing']);
                $subjects[] = $subject;
            }
            return $subjects;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function addSubject(Subject $subject){
        $query = "INSERT INTO subjects (name, description, minimum_pricing) VALUES (?,?,?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sss", $subject->getName(), $subject->getDescription(), $subject->getMinimumPricing());
        $result = $stmt->execute();
        $success = $result && $stmt->affected_rows > 0;
        $stmt->close();
        return $success;
    }

    public function deleteSubject($id){
        $id = $this->conn->real_escape_string($id);
        $query = "DELETE FROM subjects WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        $result = $stmt->execute();
        $stmt->close();
        return $result ? true : false;
    }


    public function updateSubject(Subject $subject){
        $query = "UPDATE subjects SET name = ?, description = ?, minimum_pricing = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sssi", $subject->getName(), $subject->getDescription(), $subject->getMinimumPricing(), $subject->getId());
        $result = $stmt->execute();
        $stmt->close();

        return $result ? true : false;
    }

    public function searchSubjectById($id){
        $id = $this->conn->real_escape_string($id);
        $query = "SELECT id, name, description, minimum_pricing FROM subjects WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return new Subject($row['id'], $row['name'], $row['description'], $row['minimum_pricing']);
        } else {
            return null;
        }
    }
}
