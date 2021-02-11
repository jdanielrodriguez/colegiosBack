<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    
    protected $table = 'events';

    public function types(){
        return $this->hasOne('App\Events_Types','id','type');
    }
}
