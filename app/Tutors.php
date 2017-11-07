<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tutors extends Model
{
    use SoftDeletes;
    protected $table = 'tutors';

    public function user(){
        return $this->hasOne('App\Users','tutor','id');
    }
}
