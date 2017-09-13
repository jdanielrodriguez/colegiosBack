<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inscriptions extends Model
{
    use SoftDeletes;
    protected $table = 'inscriptions';

    public function students(){
        return $this->hasOne('App\Students','id','student');
    }
}
