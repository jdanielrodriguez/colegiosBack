<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Homeworks extends Model
{
    use SoftDeletes;
    protected $table = 'homeworks';

    public function students(){
        return $this->hasOne('App\Subjects_Students','id','subject_teacher')->with('students')->with('subjects');
    }
}
