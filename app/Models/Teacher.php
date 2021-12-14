<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $guarded = [];
    public $timestamps = true;
    
    public function specializations()
    {
        return $this->belongsTo('App\Models\Specialization', 'Specialization_id');
    }

    public function Sections()
    {
        return $this->belongsToMany('App\Models\Section', 'teacher_section');
    }
}
