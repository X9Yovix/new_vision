<?php

namespace App\Repository;

use App\Models\Classroom;
use App\Models\Classrooms;
use App\Models\Gender;
use App\Models\Grade;
use App\Models\My_Parent;
use App\Models\Nationalitie;
use App\Models\Section;
use App\Models\Student;
use App\Models\Type_Blood;
use Illuminate\Support\Facades\Hash;


class StudentRepository implements StudentRepositoryInterface
{
    public function getAllStudents()
    {
        return Student::all();
    }

    public function Create_Student()
    {

        $data['my_classes'] = Grade::all();
        return view('pages.Students.add', $data);
    }

    public function Get_classrooms($id)
    {

        $list_classes = Classrooms::where("Grade_id", $id)->pluck("Name_Class", "id");
        return $list_classes;
    }

    public function Get_Sections($id)
    {
        $list_sections = Section::where("Class_id", $id)->pluck("Name_Section", "id");
        return $list_sections;
    }

    public function Store_Student($request)
    {

        try {
            $students = new Student();
            $students->name = $request->name;
            $students->email = $request->email;
            $students->password = Hash::make($request->password);
            $students->gender = $request->gender;
            $students->Date_Birth = $request->Date_Birth;
            $students->academic_year = $request->academic_year;
            $students->Grade_id = $request->Grade_id;
            $students->Classroom_id = $request->Classroom_id;
            $students->section_id = $request->section_id;
            $students->save();
            toastr()->success(trans('alerts.succ'));
            return redirect()->route('Students.create');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
