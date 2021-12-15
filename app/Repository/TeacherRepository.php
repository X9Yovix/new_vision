<?php

namespace App\Repository;

use Exception;
use App\Models\Teacher;
use App\Models\Specialization;
use Illuminate\Support\Facades\Hash;

class TeacherRepository implements TeacherRepositoryInterface
{

  public function getAllTeachers()
  {
    return Teacher::all();
  }

  public function getSpecialization()
  {
    return specialization::all();
  }

  public function storeTeachersFunction($request)
  {

    try {
      $Teachers = new Teacher();
      $Teachers->Email = $request->Email;
      $Teachers->Password =  Hash::make($request->Password);
      $Teachers->Name = $request->Name;
      $Teachers->Specialization_id = $request->Specialization_id;
      $Teachers->Gender = $request->Gender;
      $Teachers->Joining_Date = $request->Joining_Date;
      $Teachers->Address = $request->Address;
      $Teachers->save();
      toastr()->success(trans('alerts.succ'));
      return redirect()->route('Teachers.create');
    } catch (Exception $e) {
      return redirect()->back()->with(['error' => $e->getMessage()]);
    }
  }


  public function editTeachers($id)
  {
    return Teacher::findOrFail($id);
  }


  public function updateTeachers($request)
  {
    try {
      $Teachers = Teacher::findOrFail($request->id);
      $Teachers->Email = $request->Email;
      $Teachers->Password =  Hash::make($request->Password);
      $Teachers->Name = $request->Name;
      $Teachers->Specialization_id = $request->Specialization_id;
      $Teachers->Gender = $request->Gender;
      $Teachers->Joining_Date = $request->Joining_Date;
      $Teachers->Address = $request->Address;
      $Teachers->save();
      toastr()->success(trans('alerts.update'));
      return redirect()->route('Teachers.index');
    } catch (Exception $e) {
      return redirect()->back()->with(['error' => $e->getMessage()]);
    }
  }


  public function deleteTeachers($request)
  {
    Teacher::findOrFail($request->id)->delete();
    toastr()->error(trans('messages.Delete'));
    return redirect()->route('Teachers.index');
  }
}
