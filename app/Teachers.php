<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teachers extends Model
{
    use SoftDeletes;
    protected $table = 'teachers';

    public function user(){
        return $this->hasOne('App\Users','teacher','id');
    }
}
