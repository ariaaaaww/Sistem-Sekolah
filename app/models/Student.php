<?php
namespace App\Models;
require_once '../app/core/Database.php';

use App\Core\Database;

class Student extends Database
{
    protected $table = 'students';


    public function getStudents()
    {
        $students = [];

        $query = "SELECT * FROM {$this->table}";
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
        $query = "SELECT * FROM {$this->table} WHERE id = ?";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();

        $result = $stmt->get_result();
        $students = $result->fetch_assoc();

        return $students;
    }

    public function insert(array $data)
    {
        $nis = htmlspecialchars($data['nis']);
        $name = htmlspecialchars($data['name']);
        $class = htmlspecialchars($data['class']);
        $phone_number = htmlspecialchars($data['phone_number']);

        $query = "INSERT INTO {$this->table} (nis, name, class, phone_number) VALUES (?, ?, ?, ?)";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param('ssss', $nis, $name, $class, $phone_number);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            header('Location: /student');
            exit();
        } else {
            echo 'Error to store student';
        }
    }

    // Fungsi untuk mengubah data siswa
    public function update(array $data, int $id)
    {
        $nis = htmlspecialchars($data['nis']);
        $name = htmlspecialchars($data['name']);
        $class = htmlspecialchars($data['class']);
        $phone_number = htmlspecialchars($data['phone_number']);

        $query = "UPDATE {$this->table} SET name = ?, nis = ?, class = ?, phone_number = ? WHERE id = ?";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param('ssssi', $nis, $name, $class, $phone_number);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            header('Location: /student');
            exit();
        } else {
            echo 'Error to update student';
        }
    }


    public function delete(int $id)
    {
        $id = htmlspecialchars($id);

        $query = "DELETE FROM {$this->table} WHERE id = ?";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            header('Location: /students');
            exit();
        } else {
            die("Error to delete students: " . $stmt->error);
        }
    }
}
?>