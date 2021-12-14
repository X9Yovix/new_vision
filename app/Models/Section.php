<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Section extends Model
{

    protected $fillable = ['Name_Section', 'Grade_id', 'Class_id'];

    protected $table = 'Sections';
    public $timestamps = true;

    public function My_classs()
    {
        return $this->belongsTo('App\Models\Classrooms', 'Class_id');
    }

    public function teachers()
    {
        return $this->belongsToMany('App\Models\Teacher','teacher_section');
    }
}
