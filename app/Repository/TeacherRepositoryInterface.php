<?php

namespace App\Repository;

interface TeacherRepositoryInterface{

    public function getAllTeachers();

    public function Getspecialization();

    public function StoreTeachersFunction($request);

    public function editTeachers($id);

    public function UpdateTeachers($request);

    public function DeleteTeachers($request);

}