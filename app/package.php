<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class package extends Model
{
    protected $table ='packages';
    protected $hidden = [
        'created_at', 'updated_at',
     ];
}
