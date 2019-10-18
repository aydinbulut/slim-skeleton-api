<?php


namespace App\Migration;


use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\Builder;

class CreateStudentsTable
{
    public static function up(Builder $schema)  {
        $schema->create('students', function(Blueprint $table){
            // Auto-increment id
            $table->increments('id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('year_of_class');
            // Required for Eloquent's created_at and updated_at columns
            $table->timestamps();
        });
    }
    public static function down(Builder $schema)  {
        $schema->drop('students');
    }
}