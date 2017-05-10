<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Model extends Eloquent
{
    protected $dates = ['deleted_at'];
    protected $guarded = ['id', 'modified_at', 'created_at', 'deleted_at'];
}
