<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cycles_Studying_Days_Grades_Subjects_Teachers extends Model
{
    
    protected $table = 'cycles_studying_days_grades_subjects_teachers';

    public function subjects(){
        return $this->hasOne('App\Cycles_Studying_Days_Grades_Subjects','id','csdgs')->with('subjects');
    }

    public function teachers(){
        return $this->hasOne('App\Teachers','id','teacher');
    }
}
