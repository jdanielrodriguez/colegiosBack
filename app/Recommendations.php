<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recommendations extends Model
{
    
    protected $table = 'recommendations';

    public function students(){
        return $this->hasOne('App\Subjects_Students','id','subject_student')->with('students')->with('subjects');
    }
}
