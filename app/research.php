<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class research extends Model
{
    protected $table = 'research';
    protected $hidden = [
       'created_at', 'updated_at',
    ];
}
