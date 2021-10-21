<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExcerciseDetails extends Model
{
    protected $table="exercise_details";
    protected $fillable = [
    	'exercise_name', 'exercise_video', 'exercise_name_id'
    ];

 
}
