<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Events extends Model
{
    use SoftDeletes;
    protected $table = 'events';

    public function types(){
        return $this->hasOne('App\Events_Types','id','type');
    }
}
