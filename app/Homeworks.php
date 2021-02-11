<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Homeworks extends Model
{
    
    protected $table = 'homeworks';

    public function students(){
        return $this->hasOne('App\Subjects_Students','id','subject_teacher')->with('students')->with('subjects');
    }
}
