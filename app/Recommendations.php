<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recommendations extends Model
{
    use SoftDeletes;
    protected $table = 'recommendations';

    public function students(){
        return $this->hasOne('App\Subjects_Students','id','subject_student')->with('students')->with('subjects');
    }
}
