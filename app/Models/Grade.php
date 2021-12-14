<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Grade extends Model
{
    use HasTranslations;

    protected $table = "Grades";
    public $timestamps = true;
    protected $fillable = ['Name', 'Notes'];

    public $translatable = ['Name'];

    public function Sections()
    {
        return $this->hasMany('App\Models\Section', 'Grade_id');
    }
}
