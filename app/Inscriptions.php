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

    public function charges(){
        return $this->hasMany('App\Charges','idinscription','id');
    }

    public function chargesPending(){
        return $this->hasMany('App\Charges','idinscription','id')->where('state','=','1');
    }

    public function chargesPay(){
        return $this->hasMany('App\Charges','idinscription','id')->where('state','=','0');
    }
}
