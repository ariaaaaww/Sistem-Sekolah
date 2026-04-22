<?php
namespace App\Controllers;
require_once '../app/core/Controller.php';
require_once '../app/models/Student.php';

use App\Core\Controller;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        // require_once '../app/view/students/index.php';
        $studentModel = new Student();
        $students = $studentModel->getStudents();

        $this->view('students.index', [
            'students' => $students
        ]);
    }
    public function create()
    {
        // require_once '../app/view/students/create.php';
        $this->view('students.create');
        $studentModel = new Student();
        $students = $studentModel->getStudents();
    }

    public function show(string $id)
    {
        // require_once "../app/view/students/show.php";
        $id = intval($id);
        $studentModel = new Student();
        $student = $studentModel->getStudent($id);
        $this->view('students.show', [
            'student' => $student
        ]);
    }

    public function store()
    {
        $studentModel = new Student();
        $studentModel->insert($_POST);

    }
    public function edit(string $id)
    {
        // require_once '../app/view/students/edit.php';
        $id = intval($id);
        $studentModel = new Student();
        $student = $studentModel->getStudent($id);
        $this->view('students.edit', ['student' => $student]);
    }

    public function update(string $id)
    {
        $id = intval($id);
        $studentModel = new Student();
        $studentModel->update($_POST, $id);

    }

    public function destroy(string $id)
    {
        $id = intval($id);
        $studentModel = new Student();
        $studentModel->delete($id);

    }
}


?>

<!-- ../ untuk dari awal -->
<!-- ./ untuk dari folder dari file -->