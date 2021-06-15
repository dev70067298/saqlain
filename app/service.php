<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class service extends Model
{
    protected $table = 'services';
    protected $hidden = [
       'created_at', 'updated_at',
    ];
}
