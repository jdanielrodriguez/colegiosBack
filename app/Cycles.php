<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cycles extends Model
{
    use SoftDeletes;
    protected $table = 'cycles';
}
