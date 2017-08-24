<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inscriptions_Cycles_Studying_Days extends Model
{
    use SoftDeletes;
    protected $table = 'inscriptions_cycles_studying_days';
}
