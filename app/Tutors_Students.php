<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tutors_Students extends Model
{
    use SoftDeletes;
    protected $table = 'tutors_students';
}
