<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subjects_Students extends Model
{
    use SoftDeletes;
    protected $table = 'subjects_students';

    public function students(){
        return $this->hasOne('App\Students','id','student');
    }

    public function assistance(){
        return $this->hasMany('App\Students_Assistance','subject_student','id')->orderby('assistance_date','des');
    }

    public function homework(){
        return $this->hasMany('App\Homeworks','subject_teacher','id');
    }
}
