<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teachers extends Model
{
    
    protected $table = 'teachers';

    public function user(){
        return $this->hasOne('App\Users','teacher','id');
    }
}
