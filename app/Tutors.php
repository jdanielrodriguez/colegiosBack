<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tutors extends Model
{
    
    protected $table = 'tutors';

    public function user(){
        return $this->hasOne('App\Users','tutor','id');
    }
}
