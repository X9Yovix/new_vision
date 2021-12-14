<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $guarded = [];
    public $timestamps = true;
    
    public function grade()
    {
        return $this->belongsTo('App\Models\Grade', 'Grade_id');
    }

    public function classroom()
    {
        return $this->belongsTo('App\Models\Classroom', 'Classroom_id');
    }

    public function section()
    {
        return $this->belongsTo('App\Models\Section', 'section_id');
    }
}
