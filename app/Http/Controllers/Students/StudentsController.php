<?php

namespace App\Http\Controllers\Students;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudents;
use App\Repository\StudentRepositoryInterface;

class StudentsController extends Controller
{
    protected $Student;

    public function __construct(StudentRepositoryInterface $Student)
    {
        $this->Student = $Student;
    }


    public function index()
    {
        $Students = $this->Student->getAllStudents();
        return view('pages.students.students', compact('Students'));
    }


    public function create()
    {
        return $this->Student->Create_Student();
    }

    public function store(StoreStudents $request)
    {
        return $this->Student->Store_Student($request);
    }



    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }

    public function Get_classrooms($id)
    {
        return $this->Student->Get_classrooms($id);
    }

    public function Get_Sections($id)
    {
        return $this->Student->Get_Sections($id);
    }
}
