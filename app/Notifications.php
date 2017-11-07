<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notifications extends Model
{
    use SoftDeletes;
    protected $table = 'notifications';

    public function students(){
        return $this->hasOne('App\Students','id','affected');
    }

    public function tutors(){
        return $this->hasOne('App\Tutors','id','receiver');
    }

    public function teachers(){
        return $this->hasOne('App\Teachers','id','sender');
    }
}
