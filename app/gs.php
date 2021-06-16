<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gs extends Model
{
    //
    protected $table = 'gs';
    protected $hidden = [
       'created_at', 'updated_at',
    ];
}
