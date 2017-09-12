<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cycles_Studying_Days_Grades extends Model
{
    use SoftDeletes;
    protected $table = 'cycles_studying_days_grades';

    public function grades(){
        return $this->hasOne('App\Grades','id','grade');
    }

    public function cycles_studying_days(){
        return $this->hasOne('App\Cycles_Studying_Days','id','cycle_study_day')->with('cycles')->with('studying_days');
    }

    public function subjects(){
        return $this->hasOne('App\Subjects','id','subject');
    }
}
