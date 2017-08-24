<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cycles_Studying_Days_Grades extends Model
{
    use SoftDeletes;
    protected $table = 'cycles_studying_days_grades';
}
