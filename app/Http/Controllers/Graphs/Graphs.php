<?php

namespace App\Http\Controllers\Graphs;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Teacher;

class Graph extends Controller
{
    public function totalAccounts()
    {
        $student = Student::where('id')->count();
        $teacher = Teacher::where('id')->count();

        $res = $student + $teacher;
        return $res;
        //return view('pages.dashboard', compact('res'));
    }
}
