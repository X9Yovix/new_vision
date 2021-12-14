<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /* public function __construct()
    {
        $this->middleware('auth');
    } */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('auth.selection');
    }

    public function dashboard()
    {
        $student = DB::table('Students')->count();
        $teacher = DB::table('Teachers')->count();
        $res = $student + $teacher;
        return view('dashboard', compact('res'));
    }

}
