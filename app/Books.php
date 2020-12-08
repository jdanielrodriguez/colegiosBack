<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    protected $table = 'books';

    public function pages(){
        return $this->hasMany('App\Pages','book','id');
    }
}
