<?php

namespace App\Http\Controllers\Classrooms;

use App\Models\Grade;
use App\Models\Classrooms;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClassrooms;


class ClassroomsController extends Controller
{

    public function index()
    {
        $My_Classes = Classrooms::all();
        $Grades = Grade::all();
        return view('pages.classrooms.classrooms', compact('My_Classes', 'Grades'));
    }

    public function create()
    {
        //
    }

    public function store(StoreClassrooms $req)
    {
        $List_Classes = $req->List_Classes;

        try {

            $validated = $req->validated();
            foreach ($List_Classes as $List_Class) {
                /* if (Classrooms::where('Name_Class->fr', $List_Class['Name_class_fr'])->orWhere('Name_Class->en', $List_Class['Name_class_en'])->exists()) {
                    return redirect()->back()->withErrors(trans('grade_page.exists'));
                } else { */
                    $My_Classes = new Classrooms();

                    $My_Classes->Name_Class = ['en' => $List_Class['Name_class_en'], 'fr' => $List_Class['Name_class_fr']];

                    $My_Classes->Grade_id = $List_Class['Grade_id'];

                    $My_Classes->save();
                /* } */
            }

            toastr()->success(trans('alerts.succ'));
            return redirect()->route('Classrooms.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function show(Classrooms $classrooms)
    {
        //
    }

    public function edit(Classrooms $classrooms)
    {
        //
    }

    public function update(Request $request)
    {
        try {
            $Classrooms = Classrooms::findOrFail($request->id);
            $Classrooms->update([
                $Classrooms->Name_Class = ['fr' => $request->Name_fr, 'en' => $request->Name_en],
                $Classrooms->Grade_id = $request->Grade_id,
            ]);
            toastr()->success(trans('alerts.update'));
            return redirect()->route('Classrooms.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /* public function destroy(Request $request)
    {
        $Classrooms = Classrooms::findOrFail($request->id)->delete();
        
        toastr()->error(trans('alerts.delete'));
        return redirect()->route('Classrooms.index');
    } */
    public function destroy(Request $request)
    {
        $Classrooms = Classrooms::findOrFail($request->id)->delete();
        toastr()->error(trans('alerts.delete'));
        return redirect()->route('Classrooms.index');

    }


    public function delete_all(Request $request)
    {
        $delete_all_id = explode(",", $request->delete_all_id);
        Classrooms::whereIn('id', $delete_all_id)->Delete();
        toastr()->error(trans('alerts.delete'));
        return redirect()->route('Classrooms.index');
    }


    public function Filter_Classes(Request $request)
    {
        $Grades = Grade::all();
        $Search = Classrooms::select('*')->where('Grade_id','=',$request->Grade_id)->get();
        return view('pages.classrooms.classrooms',compact('Grades'))->withDetails($Search);
    }
}
