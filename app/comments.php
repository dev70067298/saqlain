<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    protected $table = 'comments';
    protected $hidden = [
       'created_at', 'updated_at',
    ];
}
