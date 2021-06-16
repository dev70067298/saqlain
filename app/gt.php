<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gt extends Model
{
    //
    protected $table = 'gt';
    protected $hidden = [
       'created_at', 'updated_at',
    ];
}
