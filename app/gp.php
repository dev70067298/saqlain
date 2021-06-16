<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gp extends Model
{
    //
    protected $table = 'gp';
    protected $hidden = [
       'created_at', 'updated_at',
    ];
}
