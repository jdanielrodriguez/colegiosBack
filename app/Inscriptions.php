<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inscriptions extends Model
{
    use SoftDeletes;
    protected $table = 'inscriptions';
}
