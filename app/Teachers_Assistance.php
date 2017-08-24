<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teachers_Assistance extends Model
{
    use SoftDeletes;
    protected $table = 'teachers_assistance';
}
