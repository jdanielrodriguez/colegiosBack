<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Studying_Days extends Model
{
    use SoftDeletes;
    protected $table = 'studying_days';
}
