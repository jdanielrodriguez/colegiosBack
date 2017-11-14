<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cycles_Studying_Days_Grades_Subjects extends Model
{
    use SoftDeletes;
    protected $table = 'cycles_studying_days_grades_subjects';

    
    public function subjects(){
        return $this->hasOne('App\Subjects','id','subject');
    }

    public function grades(){
        return $this->hasOne('App\Cycles_Studying_Days_Grades','id','csdg')->with('cycles_studying_days')->with('grades');
    }

    public function students(){
        return $this->hasOne('App\Subjects_Students','cycle_study_day_grade_subject','id')->with('students')->with('assistance')->with('homework');
    }
}
