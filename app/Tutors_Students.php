<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tutors_Students extends Model
{
    use SoftDeletes;
    protected $table = 'tutors_students';

    public function studentInfo(){
        return $this->hasOne('App\Students','id','student');
    }

    public function tutorInfo(){
        return $this->hasOne('App\Tutors','id','tutor')->with('user');
    }
}