<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Homeworks extends Model
{
    use SoftDeletes;
    protected $table = 'homeworks';
}
