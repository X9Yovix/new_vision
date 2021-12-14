<?php

namespace App\Repository;

interface StudentRepositoryInterface{

    public function getAllStudents();
    
    public function Create_Student();

    public function Get_classrooms($id);

    public function Get_Sections($id);

    public function Store_Student($request);

}