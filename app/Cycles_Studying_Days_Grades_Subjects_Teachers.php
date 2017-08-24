<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cycles_Studying_Days_Grades_Subjects_Teachers extends Model
{
    use SoftDeletes;
    protected $table = 'cycles_studying_days_grades_subjects_teachers';
}
