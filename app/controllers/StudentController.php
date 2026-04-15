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
        ] );
    }
    public function create()
    {
        // require_once '../app/view/students/create.php';
        $this->view('students.create');
    }

    public function show(string $id)
    {
        // require_once "../app/view/students/show.php";
        $this->view('students.show');
    }

    public function edit()
    {
        // require_once '../app/view/students/edit.php';
        $this->view('students.edit');
    }


}


?>

<!-- ../ untuk dari awal -->
<!-- ./ untuk dari folder dari file -->