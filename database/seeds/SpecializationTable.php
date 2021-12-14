<?php

use App\Models\Specialization;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecializationTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('specializations')->delete();
        $specializations=[
            ['en' => 'Web development','fr' => 'Développement web'],
            ['en' => 'Mobile development','fr' => 'Développement mobile'],
            ['en' => 'OOP','fr' => 'POO'],
            ['en' => 'Big Data','fr' => 'Données massives'],
        ];

        foreach ($specializations as $key) {
            Specialization::create(['Name' => $key]);
        }
    }
}
