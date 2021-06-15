<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    protected $table = 'events';
    protected $hidden = [
        'created_at', 'updated_at',
     ];
}
