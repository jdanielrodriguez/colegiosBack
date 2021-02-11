<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tutors_Students extends Model
{
    
    protected $table = 'tutors_students';

    public function studentInfo(){
        return $this->hasOne('App\Students','id','student');
    }

    public function tutorInfo(){
        return $this->hasOne('App\Tutors','id','tutor')->with('user');
    }
}