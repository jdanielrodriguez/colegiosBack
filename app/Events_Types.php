<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Events_Types extends Model
{
    use SoftDeletes;
    protected $table = 'events_types';
}
