<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class market extends Model
{
    protected $table = 'markets';
    protected $hidden = [
       'created_at', 'updated_at',
    ];
}
