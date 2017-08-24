<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subjects_Students extends Model
{
    use SoftDeletes;
    protected $table = 'subjects_students';
}
