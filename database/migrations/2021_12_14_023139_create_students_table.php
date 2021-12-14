<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->text('Name');
            $table->string('Email')->unique();
            $table->string('Password');
            $table->string('Gender');
            $table->string('Adress');
            $table->date('Date_Birth');
            $table->string('Academic_year');

            $table->bigInteger('Grade_id')->unsigned();
            $table->bigInteger('Classroom_id')->unsigned();
            $table->bigInteger('Section_id')->unsigned();

            $table->foreign('Grade_id')->references('id')->on('Grades')->onDelete('cascade');
            $table->foreign('Classroom_id')->references('id')->on('Classrooms')->onDelete('cascade');
            $table->foreign('Section_id')->references('id')->on('sections')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
