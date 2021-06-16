<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class group_content extends Model
{
    //
    protected $table = 'group_content';
    protected $hidden = [
       'created_at', 'updated_at',
    ];
}
