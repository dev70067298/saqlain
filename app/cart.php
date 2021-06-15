<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    protected $table = 'cart';
    protected $hidden = [
       'created_at', 'updated_at',
    ];
}
