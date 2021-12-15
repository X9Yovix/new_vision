<?php

namespace App\Repository;

interface TeacherRepositoryInterface{

    public function getAllTeachers();

    public function getSpecialization();

    public function storeTeachersFunction($request);

    public function editTeachers($id);

    public function updateTeachers($request);

    public function deleteTeachers($request);

}