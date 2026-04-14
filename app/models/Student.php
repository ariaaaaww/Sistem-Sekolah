<?php
namespace App\Models;
require_once "../app/core/Database.php";
require_once "../app/models/Student.php";
use App\Core\Database;

class Student extends Database
{
    protected $table = 'students';
    // private $table = "students";

    public function getStudents()
    {
        $students = [];
        $query = "SELECT * from {$this->table}";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($student = $result->fetch_assoc()) {
            $students[] = $student;
        }
        return $students;
    }

    public function getStudent(int $id)
    {
        $query = "SELECT * from {$this->table} where id = ?";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $student = $result->fetch_assoc();
        return $student;
    }

    public function insert(array $data)
    {
        $nis = htmlspecialchars($data['nis']);
        $name = htmlspecialchars($data['name']);
        $class = htmlspecialchars($data['class']);
        $phone_number = htmlspecialchars($data['phone_number']);

        $query = "INSERT INTO {$this->table} (nis, name, class, phone_number) VALUES (?, ?, ?, ?)";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("ssss", $nis, $name, $class, $phone_number);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            header('Location: /students');
            exit();
        } else {
            die('Error to insert students: ' . $stmt->error);
        }
    }

    public function delete(int $id)
    {
        $id = htmlspecialchars($id);
        $query = "DELETE FROM {$this->table} WHERE id = ?";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            header('Location: /students');
            exit();
        } else {
            die('Error to delete students: ' . $stmt->error);
        }
    }
}
?>