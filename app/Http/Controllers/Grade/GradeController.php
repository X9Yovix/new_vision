<?php

namespace App\Http\Controllers\Grade;

use toastr;
use App\Models\Grade;
use App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\StoreGrades;
use App\Http\Controllers\Controller;
use App\Models\Classrooms;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allGrades = Grade::all();
        return view('pages.grade.grade', compact('allGrades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGrades $request)
    {
        if (Grade::where('Name->fr', $request->Name_fr)->orWhere('Name->en', $request->Name_en)->exists()) {
            return redirect()->back()->withErrors(trans('grade_page.Exists'));
        }
        try {
            $validated = $request->validated();
            $translations = [
                'en' => $request->Name_en,
                'fr' => $request->Name_fr
            ];
            $grade = new Grade();
            $grade->setTranslations('Name', $translations);
            $grade->Notes = $request->Notes;
            $grade->save();
            toastr()->success(trans('alerts.succ'));
            return redirect()->route('Grade.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function show(Grade $grade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function edit(Grade $grade)
    {
        //
    }

    public function update(StoreGrades $request)
    {
        try {
            $validated = $request->validated();
            $grade = Grade::findOrFail($request->id);
            $grade->update([
                $grade->Name = ['en' => $request->Name_en, 'fr' => $request->Name_fr],
                $grade->Notes = $request->Notes
            ]);

            toastr()->warning(trans('alerts.update'));
            return redirect()->route('Grade.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function destroy(Request $request)
    {
        $MyClass_id = Classrooms::where('Grade_id', $request->id)->pluck('Grade_id');

        if ($MyClass_id->count() == 0) {

            $Grades = Grade::findOrFail($request->id)->delete();
            toastr()->error(trans('alerts.delete'));
            return redirect()->route('Grade.index');
        } else {

            toastr()->error(trans('grade_page.Delete_Grade_Error'));
            return redirect()->route('Grade.index');
        }
        /* try {
            $grade = Grade::findOrFail($request->id);
            $grade->delete();

            toastr()->error(trans('alerts.delete'));
            return redirect()->route('Grade.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        } */
    }
}
