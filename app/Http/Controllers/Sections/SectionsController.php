<?php

namespace App\Http\Controllers\Sections;

use App\Models\Grade;
use App\Models\Section;
use App\Models\Teacher;
use App\Models\Classrooms;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSections;

class SectionsController extends Controller
{


    public function index()
    {
        $teachers = Teacher::all();

        $Grades = Grade::with(['Sections'])->get();

        $list_Grades = Grade::all();
        return view('pages.sections.sections', compact('Grades', 'list_Grades','teachers'));
    }

    public function store(StoreSections $request)
    {
        try {
            $validated = $request->validated();
            $Sections = new Section();

            $Sections->Name_Section = $request->Name_Section;
            $Sections->Grade_id = $request->Grade_id;
            $Sections->Class_id = $request->Class_id;
            $Sections->Status = 1;
            $Sections->save();
            $Sections->teachers()->attach($request->teacher_id);
            toastr()->success(trans('alerts.succ'));

            return redirect()->route('Sections.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function update(StoreSections $request)
    {
        try {
            $validated = $request->validated();
            $Sections = Section::findOrFail($request->id);

            $Sections->Name_Section = $request->Name_Section;
            $Sections->Grade_id = $request->Grade_id;
            $Sections->Class_id = $request->Class_id;

            if (isset($request->Status)) {
                $Sections->Status = 1;
            } else {
                $Sections->Status = 2;
            }
            
            if (isset($request->teacher_id)) {
                $Sections->teachers()->sync($request->teacher_id);
            } else {
                $Sections->teachers()->sync(array());
            }
            $Sections->save();
            toastr()->success(trans('alerts.update'));

            return redirect()->route('Sections.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(request $request)
    {
        Section::findOrFail($request->id)->delete();
        toastr()->error(trans('alerts.delete'));
        return redirect()->route('Sections.index');
    }

    public function getclasses($id)
    {
        $list_classes = Classrooms::where("Grade_id", $id)->pluck("Name_Class", "id");
        return $list_classes;
    }
}
